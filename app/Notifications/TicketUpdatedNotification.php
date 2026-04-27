<?php

namespace App\Notifications;

use App\Models\HelpTicket;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Contracts\Queue\ShouldQueue;

class TicketUpdatedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $ticket;
    private $message;
    private $type;

    /**
     * Create a new notification instance.
     */
    public function __construct(HelpTicket $ticket, $message, $type = 'reply')
    {
        $this->ticket = $ticket;
        $this->message = $message;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("Ticket Update: #{$this->ticket->ticket_id}")
            ->line("An update has been posted to your ticket: {$this->ticket->subject}.")
            ->line($this->message)
            ->action('View Ticket', route('frontend.help-tickets.show', $this->ticket->id))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'ticket_id' => $this->ticket->id,
            'ticket_number' => $this->ticket->ticket_id,
            'message' => $this->message,
            'type' => 'ticket',
            'title' => "Ticket #{$this->ticket->ticket_id} updated",
        ];
    }
}
