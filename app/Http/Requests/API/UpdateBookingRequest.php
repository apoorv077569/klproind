<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $bookingId = $this->route('booking');
        $isDirect = false;
        if ($bookingId) {
            $booking = \App\Models\Booking::find($bookingId instanceof \App\Models\Booking ? $bookingId->id : $bookingId);
            if ($booking && $booking->servicemen()->exists()) {
                $isDirect = true;
            }
        }

        return [
            'reason' => [
                Rule::requiredIf(function() use ($isDirect) {
                    $status = $this->input('booking_status');
                    if (in_array($status, ['cancel', 'on-hold'])) return true;
                    // For decline, reason is only mandatory if it is a direct assignment
                    if ($status === 'decline' && $isDirect) return true;
                    return false;
                })
            ],
            'booking_status' => [
                'required',
                Rule::exists('booking_status', 'slug')->whereNull('deleted_at'),
            ],
        ];
    }
}
