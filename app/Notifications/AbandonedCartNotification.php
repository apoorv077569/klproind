<?php

namespace App\Notifications;

use App\Models\Cart;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AbandonedCartNotification extends Notification
{
    use Queueable;

    private $cart;

    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Complete Your Booking')
            ->line('You have items in your cart that are waiting to be booked.')
            ->line('Service: ' . $this->cart->service?->title)
            ->action('Complete Booking', url('/')) // In a real app, this would be the cart/checkout URL
            ->line('Thank you for using our service!');
    }

    public function toArray($notifiable)
    {
        return [
            'title' => 'Complete Your Booking',
            'message' => 'Your cart for ' . $this->cart->service?->title . ' is still active. Book now!',
            'type' => 'cart',
        ];
    }
}
