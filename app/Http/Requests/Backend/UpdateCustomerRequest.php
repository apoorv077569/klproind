<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Enums\RoleEnum;

class UpdateCustomerRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required', 'string', 'email', 'max:255',
                function ($attribute, $value, $fail) {
                    $userId = $this->route('customer')?->id;
                    if (User::role(RoleEnum::CONSUMER)->where('email', $value)->where('id', '!=', $userId)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'email']));
                    }
                }
            ],
            'phone' => [
                'required', 'max:255',
                function ($attribute, $value, $fail) {
                    $userId = $this->route('customer')?->id;
                    if (User::role(RoleEnum::CONSUMER)->where('phone', $value)->where('id', '!=', $userId)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'phone']));
                    }
                }
            ],
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'address_type' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'state_id' => 'required|exists:states,id',
            'city' => 'required|string',
            'alternative_phone' => 'numeric|nullable',
            'alternative_name' => 'string|nullable',
            // 'area' => 'required|string',
            'postal_code' => 'required',
            'address' => 'required',
        ];
    }
}
