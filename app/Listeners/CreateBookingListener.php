<?php

namespace App\Listeners;

use Exception;
use App\Models\User;
use App\Enums\RoleEnum;
use App\Helpers\Helpers;
use App\Models\SmsTemplate;
use App\Events\CreateBookingEvent;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\PushNotificationTemplate;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\CreateBookingNotification;

class CreateBookingListener
{
    use InteractsWithQueue;

    public $queue = 'createBookingEvent';

    /**
     * Handle the event.
     */
    public function handle(CreateBookingEvent $event)
    {
        try {
            $consumer = $event->booking->consumer;
            if (isset($consumer) && is_null($event->booking->parent_id)) {
                $topic = 'user_' . $consumer->id;
                $this->sendPushNotification($topic, $event, RoleEnum::CONSUMER);
                $consumer->notify(new CreateBookingNotification($event->booking, RoleEnum::CONSUMER));
            }
            
            /*
            if ($event->booking->provider_id) {
                $provider = Helpers::getProviderById($event->booking->provider_id);
                $topic = 'user_' . $provider->id;
                $this->sendPushNotification($topic, $event, RoleEnum::PROVIDER);
                $provider->notify(new CreateBookingNotification($event->booking, RoleEnum::PROVIDER));
                $sendTo = ('+'.$provider?->code.$provider?->phone);
                Helpers::sendSMS($sendTo, $this->getSMSMessage($event, RoleEnum::PROVIDER));
            }
            */
            
            $admin = User::role(RoleEnum::ADMIN)->first();
            if (isset($admin)) {
                $admin->notify(new CreateBookingNotification($event->booking, RoleEnum::ADMIN));
                $sendTo = ('+'.$admin?->code.$admin?->phone);
                Helpers::sendSMS($sendTo, $this->getSMSMessage($event, RoleEnum::ADMIN));
            }

            // Send notification to servicemen
            if ($event->booking->zone_id) {
                $isTargetedBooking = false;

                // Case 1: Targeted Booking - Only notify assigned servicemen
                if ($event->booking->servicemen()->exists()) {
                    $servicemen = $event->booking->servicemen;
                    $isTargetedBooking = true;
                } else {
                    // Case 2: Broadcast Booking - Notify all eligible servicemen in the zone
                    $serviceId = $event->booking->service_id;
                    $packageId = $event->booking->service_package_id;
                    
                    $query = User::role(RoleEnum::SERVICEMAN)
                        ->where('status', true)
                        ->whereHas('zones', function ($query) use ($event) {
                            $query->where('zones.id', $event->booking->zone_id);
                        });

                    if ($packageId) {
                        // Logic for Service Package: Only notify selected servicemen for this package
                        $query->whereHas('service_packages', function($q) use ($packageId) {
                            $q->where('service_packages.id', $packageId);
                        });
                    } else {
                        // Logic for Regular Service: Check expertise
                        $query->whereHas('expertise', function ($query) use ($serviceId) {
                            $query->where('services.id', $serviceId);
                        });
                    }

                    $servicemen = $query->with(['timeslot'])->get();
                }

                foreach ($servicemen as $serviceman) {
                    // Check Time Slot Availability (only for broadcast recordings)
                    if (!$isTargetedBooking) {
                        if (!$event->booking->date_time) {
                            continue;
                        }
                        if (!$serviceman->isAvailableAt($event->booking->date_time)) {
                            continue;
                        }
                    }

                    // Notify serviceman
                    $topic = 'user_' . $serviceman->id;
                    $this->sendPushNotification($topic, $event, RoleEnum::SERVICEMAN);
                    $serviceman->notify(new CreateBookingNotification($event->booking, RoleEnum::SERVICEMAN));
                }
            }

        } catch (Exception $e) {

        }
    }

    public function sendPushNotification($topic, $event, $role)
    {
        $locale = request()->hasHeader('Accept-Lang') ? request()->header('Accept-Lang') : app()->getLocale();
        $slug = '';

        switch ($role) {
            case 'admin':
                $slug = 'booking-created-admin';
                break;
            case 'provider':
                $slug = 'booking-created-provider';
                break;
            case 'consumer':
                $slug = 'booking-created-consumer';
                break;
            case 'serviceman':
                $slug = 'booking-created-serviceman';
                break;
        }

        $content = PushNotificationTemplate::where('slug', $slug)->first();

        if ($content) {
            $data = [
                '{{booking_number}}' => $event->booking?->booking_number,
                '{{service_name}}' => $event->booking?->service?->title,
            ];

            $title = $content->title[$locale];
            $body = str_replace(array_keys($data), array_values($data), $content->content[$locale]);
        } else {

            $title = "A booking #{$event->booking?->booking_number} for " . ($event->booking?->service?->title ?? '') . " has been placed";
            $body = 'Congratulations! A new booking has been placed for ' . ($event->booking?->service?->title ?? '') . '.';
        }

        if ($topic) {
            $notification = [
                'message' => [
                    'topic' => $topic,
                    'notification' => [
                        'title' => $title,
                        'body' => $body,
                        'image' => "",
                    ],
                    'data' => [
                        'click_action' => "FLUTTER_NOTIFICATION_CLICK",
                        'type' => 'booking',
                        'booking_id' => (string) $event?->booking?->id,
                    ],
                ],
            ];

            Helpers::pushNotification($notification);
        }
    }

    public function getSMSMessage($event, $role)
    {
        $locale = request()->hasHeader('Accept-Lang') ? request()->header('Accept-Lang') : app()->getLocale();
        $slug = '';
        switch ($role) {
            case 'admin':
                $slug = 'booking-created-admin';
                break;
            case 'provider':
                $slug = 'booking-created-provider';
                break;
        }

        $content = SmsTemplate::where('slug', $slug)->first();
        if ($content) {
            $data = [
                '{{booking_number}}' => $event->booking?->booking_number,
            ];
            $message = str_replace(array_keys($data), array_values($data), $content->content[$locale]);
        }  else {
            $message = 'Congratulations! A new booking has been received.';
        }
        return $message;
    }
}
