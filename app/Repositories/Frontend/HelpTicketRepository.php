<?php

namespace App\Repositories\Frontend;

use App\Models\HelpTicket;
use App\Models\TicketReply;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Exception;
use App\Helpers\Helpers;
use App\Models\User;
use App\Notifications\TicketUpdatedNotification;
use Illuminate\Support\Facades\Notification;

class HelpTicketRepository extends BaseRepository
{
    public function model()
    {
        return HelpTicket::class;
    }

    public function index()
    {
        $tickets = $this->model->where('user_id', auth()->id())->latest()->paginate(10);
        return view('frontend.help-ticket.index', compact('tickets'));
    }

    public function create()
    {
        return view('frontend.help-ticket.create');
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $ticketData = $request->all();
            $ticketData['user_id'] = auth()->id();
            $ticketData['ticket_id'] = 'TK-' . date('Y') . '-' . strtoupper(uniqid()); // Simple ID generation
            
            $ticket = $this->model->create($ticketData);

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $ticket->addMedia($file)->toMediaCollection('attachments');
                }
            }

            
            // Notify User
            $ticket->user->notify(new TicketUpdatedNotification($ticket, "Your ticket #{$ticket->ticket_id} has been created successfully.", 'new_ticket'));

            // Notify Admins
            $admins = User::role('admin')->get();
            Notification::send($admins, new TicketUpdatedNotification($ticket, "New ticket raised: " . $ticket->ticket_id, 'new_ticket'));

            DB::commit();
            return redirect()->route('frontend.help-tickets.index')->with('message', 'Ticket raised successfully. ID: ' . $ticket->ticket_id);
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $ticket = $this->model->where('user_id', auth()->id())->with(['replies.user', 'booking'])->findOrFail($id);
        return view('frontend.help-ticket.show', compact('ticket'));
    }

    public function reply($request, $id)
    {
        DB::beginTransaction();
        try {
            $ticket = $this->model->where('user_id', auth()->id())->findOrFail($id);
            
            $reply = TicketReply::create([
                'help_ticket_id' => $ticket->id,
                'user_id' => auth()->id(),
                'message' => $request['message'],
            ]);

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $reply->addMedia($file)->toMediaCollection('attachments');
                }
            }

            
            // Notify Admins
            $admins = User::role('admin')->get();
            Notification::send($admins, new TicketUpdatedNotification($ticket, "New reply on ticket: " . $ticket->ticket_id, 'reply'));

            DB::commit();
            return redirect()->back()->with('message', 'Reply sent successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }
}
