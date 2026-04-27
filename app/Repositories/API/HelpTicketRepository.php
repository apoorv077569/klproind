<?php

namespace App\Repositories\API;

use App\Models\HelpTicket;
use App\Models\TicketReply;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Exception;
use App\Models\User;
use App\Notifications\TicketUpdatedNotification;
use Illuminate\Support\Facades\Notification;
use App\Exceptions\ExceptionHandler;

class HelpTicketRepository extends BaseRepository
{
    public function model()
    {
        return HelpTicket::class;
    }

    public function index($request)
    {
        try {
            return $this->model->where('user_id', auth()->id())
                ->with(['booking'])
                ->latest()
                ->paginate($request->paginate ?? 10);
        } catch (Exception $e) {
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function store($request)
    {
        DB::beginTransaction();
        try {
            $ticketData = $request->all();
            $ticketData['user_id'] = auth()->id();
            $ticketData['ticket_id'] = 'TK-' . date('Y') . '-' . strtoupper(uniqid());
            
            $ticket = $this->model->create($ticketData);

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $ticket->addMedia($file)->toMediaCollection('attachments');
                }
            }
            
            // Notify Admins
            $admins = User::role('admin')->get();
            Notification::send($admins, new TicketUpdatedNotification($ticket, "New ticket raised: " . $ticket->ticket_id, 'new_ticket'));

            DB::commit();
            return [
                'success' => true,
                'message' => 'Ticket raised successfully',
                'data' => $ticket->load(['user', 'booking'])
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    public function show($id)
    {
        try {
            return $this->model->where('user_id', auth()->id())
                ->with(['replies.user', 'booking'])
                ->findOrFail($id);
        } catch (Exception $e) {
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
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

            // Send Push Notification to Admins
            foreach ($admins as $admin) {
                $this->sendPushNotification($admin->id, "New reply on ticket #" . $ticket->ticket_id, $request['message']);
            }

            DB::commit();
            return [
                'success' => true,
                'message' => 'Reply sent successfully',
                'data' => $reply->load('user')
            ];
        } catch (Exception $e) {
            DB::rollBack();
            throw new ExceptionHandler($e->getMessage(), $e->getCode());
        }
    }

    protected function sendPushNotification($user_id, $title, $message)
    {
        try {
            $notification = [
                'message' => [
                    'topic' => 'user_' . $user_id,
                    'notification' => [
                        'title' => $title,
                        'body' => $message,
                    ],
                    'data' => [
                        'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
                        'type' => 'ticket',
                    ],
                ],
            ];
            \App\Helpers\Helpers::pushNotification($notification);
        } catch (Exception $e) {
            // Silently fail if push notification fails
        }
    }
}
