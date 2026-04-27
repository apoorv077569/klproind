<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'area' => $this->area,
            'postal_code' => $this->postal_code,
            'city' => $this->city,
            'address' => $this->address,
            'street_address' => $this->street_address,
            'is_primary' => $this->is_primary,
            'type' => $this->type,
            'alternative_name' => $this->alternative_name,
            'alternative_phone' => $this->alternative_phone,
            'status' => $this->status,
            'country' => [
                'id' => $this->country?->id,
                'name' => $this->country?->name,
            ],
            'state' => [
                'id' => $this->state?->id,
                'name' => $this->state?->name,
            ],
        ];
    }
}
