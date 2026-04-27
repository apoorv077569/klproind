<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Enums\RoleEnum;

class UpdateServiceManRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => [
                'required', 'string', 'email', 'max:255',
                function ($attribute, $value, $fail) {
                    $userId = $this->route('serviceman');
                    if (User::role([RoleEnum::PROVIDER, RoleEnum::SERVICEMAN])->where('email', $value)->where('id', '!=', $userId)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'email']));
                    }
                }
            ],
            'phone' => [
                'required', 'max:255',
                function ($attribute, $value, $fail) {
                    $userId = $this->route('serviceman');
                    if (User::role([RoleEnum::PROVIDER, RoleEnum::SERVICEMAN])->where('phone', $value)->where('id', '!=', $userId)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'phone']));
                    }
                }
            ],
            'experience_interval' => 'required|in:years,months',
            'experience_duration' => 'required|numeric',
            'zones' => 'nullable|array',
            'zones.*' => 'exists:zones,id',

            'address_type' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city' => 'required|string',
            'alternative_phone' => 'numeric|nullable',
            'alternative_name' => 'string|nullable',
            'postal_code' => 'required',
        ];
    }
}
