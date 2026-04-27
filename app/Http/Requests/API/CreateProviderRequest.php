<?php

namespace App\Http\Requests\API;

use App\Exceptions\ExceptionHandler;
use App\Rules\LatitudeLongitude;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Enums\RoleEnum;

class CreateProviderRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => [
                'required', 'string', 'email', 'max:255',
                function ($attribute, $value, $fail) {
                    if (User::role([RoleEnum::PROVIDER, RoleEnum::SERVICEMAN])->where('email', $value)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'email']));
                    }
                }
            ],
            'country_id' => 'required', 'exists:countries,id',
            'state_id' => 'required', 'exists:states,id',
            'city' => 'required', 'string',
            'countryCode' => 'required',
            'phone' => [
                'required', 'min:8',
                function ($attribute, $value, $fail) {
                    if (User::role([RoleEnum::PROVIDER, RoleEnum::SERVICEMAN])->where('phone', $value)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'phone']));
                    }
                }
            ],
            'latitude' => ['required', new LatitudeLongitude],
            'longitude' => ['required', new LatitudeLongitude],
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password',
        ];

    }

    public function failedValidation(Validator $validator)
    {
        throw new ExceptionHandler($validator->errors()->first(), 422);
    }
}
