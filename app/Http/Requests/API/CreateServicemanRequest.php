<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Enums\RoleEnum;

class CreateServicemanRequest extends FormRequest
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
        return [
            'name' => 'required|max:255|string',
            'email' => [
                'required', 'email',
                function ($attribute, $value, $fail) {
                    if (User::role([RoleEnum::PROVIDER, RoleEnum::SERVICEMAN])->where('email', $value)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'email']));
                    }
                }
            ],
            'code' => 'sometimes|required',
            'phone' => [
                'required', 'max:255',
                function ($attribute, $value, $fail) {
                    if (User::role([RoleEnum::PROVIDER, RoleEnum::SERVICEMAN])->where('phone', $value)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'phone']));
                    }
                }
            ],
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
            'experience_interval' => 'required|in:years,months',
            'experience_duration' => 'required|numeric',
            'image' => 'nullable|mimes:jpg,png,jpeg',
            'zones' => 'required|array|min:1',
            'zones.*' => 'exists:zones,id',
            'services' => 'sometimes|array',
            'services.*' => 'exists:services,id',
            'known_languages' => 'sometimes|array',
            'known_languages.*' => 'exists:languages,id',
            'description' => 'nullable|string',
            'status' => 'sometimes|boolean',
            'address_type' => 'required|string',
            'custom_text' => 'required_if:address_type,other',
            'alternative_name' => 'nullable|string',
            'alternative_code' => 'nullable',
            'alternative_phone' => 'nullable|numeric',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city' => 'required|string',
            'address' => 'required',
            'area' => 'sometimes|required|string',
            'street_address' => 'nullable|string',
            'postal_code' => 'required',
            'latitude' => 'sometimes|required',
            'longitude' => 'sometimes|required',
        ];
    }
}
