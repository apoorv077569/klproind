<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Validation\Rule;

class UpdateServicemanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'sometimes|required|max:255|string',
            'email' => [
                'required',
                function ($attribute, $value, $fail) {
                    $userId = $this->serviceman;
                    if (User::role([RoleEnum::PROVIDER, RoleEnum::SERVICEMAN])->where('email', $value)->where('id', '!=', $userId)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'email']));
                    }
                }
            ],
            'code' => 'sometimes|required',
            'phone' => [
                'sometimes', 'required', 'max:255',
                function ($attribute, $value, $fail) {
                    $userId = $this->serviceman;
                    if (User::role([RoleEnum::PROVIDER, RoleEnum::SERVICEMAN])->where('phone', $value)->where('id', '!=', $userId)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'phone']));
                    }
                }
            ],
            'password' => 'nullable|string|min:8',
            'confirm_password' => 'nullable|same:password',
            'experience_interval' => 'sometimes|required|in:years,months',
            'experience_duration' => 'sometimes|required|numeric',
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'zones' => 'sometimes|required|array|min:1',
            'zones.*' => 'exists:zones,id',
            'services' => 'sometimes|array',
            'services.*' => 'exists:services,id',
            'known_languages' => 'sometimes|array',
            'known_languages.*' => 'exists:languages,id',
            'description' => 'nullable|string',
            'status' => 'sometimes|boolean',
            'address_id' => 'required|exists:addresses,id',
            'address_type' => 'sometimes|required|string',
            'custom_text' => 'required_if:address_type,other',
            'alternative_name' => 'nullable|string',
            'alternative_code' => 'nullable',
            'alternative_phone' => 'nullable|numeric',
            'country_id' => 'sometimes|required|exists:countries,id',
            'state_id' => 'sometimes|required|exists:states,id',
            'city' => 'sometimes|required|string',
            'address' => 'sometimes|required',
            'area' => 'sometimes|required|string',
            'street_address' => 'nullable|string',
            'postal_code' => 'sometimes|required',
            'latitude' => 'sometimes|required',
            'longitude' => 'sometimes|required',
        ];
    }
}
