<?php

namespace App\Repositories\Backend;

use App\Models\HelpTicket;
use App\Models\TicketReply;
use Illuminate\Support\Facades\DB;
use Prettus\Repository\Eloquent\BaseRepository;
use Exception;
use App\Exceptions\ExceptionHandler;
use App\Notifications\TicketUpdatedNotification;
use App\Models\User;
use App\Helpers\Helpers;

class HelpTicketRepository extends BaseRepository
{
    public function model()
    {
        return HelpTicket::class;
    }

    public function index($dataTable)
    {
        return $dataTable->render('backend.help-ticket.index');
    }

    public function show($id)
    {
        $ticket = $this->model->with(['user', 'booking', 'replies.user'])->findOrFail($id);
        return view('backend.help-ticket.show', compact('ticket'));
    }

    public function updateStatus($request, $id)
    {
        DB::beginTransaction();
        try {
            $ticket = $this->model->findOrFail($id);
            $ticket->update(['status' => $request['status']]);
            
            // Notify User
            $ticket->user->notify(new TicketUpdatedNotification($ticket, "Your ticket status has been changed to " . ucfirst($request['status']), 'status'));

            // Send Push Notification
            $this->sendPushNotification($ticket, "Ticket status updated for #" . $ticket->ticket_id, "Your ticket status has been changed to " . ucfirst($request['status']));

            DB::commit();
            return redirect()->back()->with('message', 'Ticket status updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function reply($request, $id)
    {
        DB::beginTransaction();
        try {
            $ticket = $this->model->findOrFail($id);
            
            $reply = TicketReply::create([
                'help_ticket_id' => $ticket->id,
                'user_id' => auth()->id(),
                'message' => $request['message'],
            ]);

            // Add attachments if any
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $reply->addMedia($file)->toMediaCollection('attachments');
                }
            }

            // Notify User
            $ticket->user->notify(new TicketUpdatedNotification($ticket, "New reply from Support", 'reply'));

            // Send Push Notification
            $this->sendPushNotification($ticket, "New reply on ticket #" . $ticket->ticket_id, $request['message']);

            DB::commit();
            return redirect()->back()->with('message', 'Reply sent successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $ticket = $this->model->findOrFail($id);
            $ticket->delete();
            return redirect()->back()->with('message', 'Ticket deleted successfully');
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    protected function sendPushNotification($ticket, $title, $message)
    {
        try {
            $notification = [
                'message' => [
                    'topic' => 'user_' . $ticket->user_id,
                    'notification' => [
                        'title' => $title,
                        'body' => $message,
                    ],
                    'data' => [
                        'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
                        'type' => 'ticket',
                        'ticket_id' => (string) $ticket->id,
                    ],
                ],
            ];
            Helpers::pushNotification($notification);
        } catch (Exception $e) {
            // Silently fail if push notification fails
        }
    }
}
