<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $serviceList = null;
        $servicePackageList = null;

        if ($this->is_package) {
            $sp = $this->whenLoaded('servicePackage');
            if ($sp instanceof \App\Models\ServicePackage || (is_object($sp) && isset($sp->id))) {
                $servicePackageList = [
                    'id' => $sp->id,
                    'title' => $sp->title,
                    'price' => (float) $sp->price,
                    'discount' => $sp->discount,
                    'description' => $sp->description,
                    'provider_id' => $sp->provider_id,
                    'hexa_code' => $sp->hexa_code,
                    'image' => $sp->media->first()?->original_url ?? null,
                    'services' => is_string($this->package_services) ? json_decode($this->package_services, true) : ($this->package_services ?? []),
                    'user' => $sp->user ? [
                        'id' => $sp->user->id,
                        'name' => $sp->user->name,
                        'image' => $sp->user->media->first()?->original_url ?? null
                    ] : null
                ];
            }
        } else {
            $s = $this->whenLoaded('service');
            $a = $this->whenLoaded('address');
            if ($s instanceof \App\Models\Service || (is_object($s) && isset($s->id))) {
                $taxes = [];
                if (isset($s->taxes)) {
                    foreach ($s->taxes as $t) {
                        $taxes[] = [
                            'id' => $t->id,
                            'name' => $t->name,
                            'rate' => (float) $t->rate
                        ];
                    }
                }

                $serviceList = [
                    "id" => $s->id,
                    "title" => $s->title,
                    "price" => (float) $s->price,
                    "type" => $s->type ?? $this->service_type,
                    "image" => $s->web_img_thumb_url ?? ($s->media->first()?->original_url ?? null),
                    "required_servicemen" => $this->required_servicemen ?? $s->required_servicemen ?? 1,
                    "selectedRequiredServiceMan" => $this->required_servicemen ?? $s->required_servicemen ?? 1,
                    "selectServiceManType" => $this->select_serviceman_type ?? 'app_choose',
                    "selectDateTimeOption" => $this->select_date_time_option ?? 'custom',
                    "selectedDateTimeFormat" => $this->selected_date_time_format ?? ($this->date_time ? \Carbon\Carbon::parse($this->date_time)->format('a') : 'pm'),
                    "serviceDate" => $this->date_time ? \Carbon\Carbon::parse($this->date_time)->format('Y-m-d\TH:i:s.v') : null,
                    "selectedServiceNote" => $this->custom_message,
                    "primary_address" => $a && $a->id ? [
                        "id" => $a->id,
                        "address" => $a->address,
                        "lat" => $a->lat,
                        "lng" => $a->lng
                    ] : null,
                    "selectedAdditionalServices" => is_string($this->additional_services) ? json_decode($this->additional_services, true) : ($this->additional_services ?? []),
                    "selectedServiceMan" => count($this->servicemen ?? []) > 0 ? $this->servicemen->map(function ($sm) {
                        return ['id' => $sm->id, 'name' => $sm->name, 'image' => $sm->media->first()?->original_url ?? null]; }) : [],
                    "taxes" => $this->taxes ?? [],
                    "discount" => $this->discount ?? 0,
                    "discount_type" => $this->discount_type ?? 'percentage',
                    "isScheduledBooking" => !empty($this->schedule_start_date) ? 1 : 0,
                    "bookingFrequency" => $this->booking_frequency,
                    "scheduledDatesJson" => is_string($this->scheduled_dates_json) ? json_decode($this->scheduled_dates_json, true) : ($this->scheduled_dates_json ?? [])
                ];
            }
        }

        return [
            'id' => $this->id,
            'isPackage' => (bool) $this->is_package,
            'serviceList' => $serviceList,
            'servicePackageList' => $servicePackageList,
            'serviceDetailsModel' => null
        ];
    }
}
