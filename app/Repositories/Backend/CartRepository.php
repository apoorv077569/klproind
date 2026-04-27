<?php

namespace App\Repositories\Backend;

use App\Models\Cart;
use Prettus\Repository\Eloquent\BaseRepository;

class CartRepository extends BaseRepository
{
    public function model()
    {
        return Cart::class;
    }

    public function index()
    {
        $carts = $this->model->with(['service', 'customer', 'address'])->latest()->get();
        return view('backend.cart.index', compact('carts'));
    }

    public function reminder($id)
    {
        try {
            $cart = $this->model->with(['service', 'customer'])->findOrFail($id);
            $customer = $cart->customer;

            if ($customer) {
                // 1. Send DB/Email Notification
                $customer->notify(new \App\Notifications\AbandonedCartNotification($cart));

                // 2. Send Push Notification
                try {
                    $topic = 'user_' . $customer->id;
                    $notification = [
                        'message' => [
                            'topic' => $topic,
                            'notification' => [
                                'title' => 'Complete Your Booking',
                                'body' => 'Your cart for ' . $cart->service?->title . ' is still active. Book now!',
                                'image' => '',
                            ],
                            'data' => [
                                'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
                                'type' => 'cart',
                                'cart_id' => (string) $cart->id,
                            ],
                        ],
                    ];
                    \App\Helpers\Helpers::pushNotification($notification);
                } catch (\Exception $e) {
                    // Log or ignore push failure
                }

                return redirect()->back()->with('message', 'Reminder sent successfully!');
            }

            return redirect()->back()->with('error', 'Customer not found!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
