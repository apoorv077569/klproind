<?php

namespace App\Http\Requests\API;

use App\Exceptions\ExceptionHandler;
use App\Helpers\Helpers;
use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServicemanProfileRequest extends FormRequest
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
        $id = Helpers::getCurrentUserId();

        return [
            'name' => ['string', 'max:255'],
            'email' => [
                'email',
                function ($attribute, $value, $fail) use ($id) {
                    if (User::role([RoleEnum::PROVIDER, RoleEnum::SERVICEMAN])->where('email', $value)->where('id', '!=', $id)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'email']));
                    }
                }
            ],
            'phone' => [
                'required', 'digits_between:6,15',
                function ($attribute, $value, $fail) use ($id) {
                    if (User::role([RoleEnum::PROVIDER, RoleEnum::SERVICEMAN])->where('phone', $value)->where('id', '!=', $id)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'phone']));
                    }
                }
            ],
            'code' => ['required'],
            'profile_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'description' => ['nullable', 'string'],
            'experience_duration' => ['nullable', 'numeric'],
            'experience_interval' => ['nullable', 'string', 'in:days,months,years'],
            
            // Address fields
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'state_id' => ['required', 'exists:states,id'],
            'country_id' => ['required', 'exists:countries,id'],
            'postal_code' => ['required', 'string'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'area' => ['nullable', 'string'],
            'type' => ['nullable', 'string'],
            'availability_radius' => ['nullable', 'numeric'],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new ExceptionHandler($validator->errors()->first(), 422);
    }
}
