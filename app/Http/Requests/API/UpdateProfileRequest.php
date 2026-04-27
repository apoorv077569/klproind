<?php

namespace App\Http\Requests\API;

use App\Exceptions\ExceptionHandler;
use App\Helpers\Helpers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Enums\RoleEnum;

class UpdateProfileRequest extends FormRequest
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
            'name' => ['max:255'],
            'email' => [
                'email',
                function ($attribute, $value, $fail) use ($id) {
                    $user = auth()->user();
                    $roles = $user->hasRole(RoleEnum::CONSUMER) ? [RoleEnum::CONSUMER] : [RoleEnum::PROVIDER, RoleEnum::SERVICEMAN];
                    if (User::role($roles)->where('email', $value)->where('id', '!=', $id)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'email']));
                    }
                }
            ],
            'phone' => [
                'required', 'digits_between:6,15',
                function ($attribute, $value, $fail) use ($id) {
                    $user = auth()->user();
                    $roles = $user->hasRole(RoleEnum::CONSUMER) ? [RoleEnum::CONSUMER] : [RoleEnum::PROVIDER, RoleEnum::SERVICEMAN];
                    if (User::role($roles)->where('phone', $value)->where('id', '!=', $id)->whereNull('deleted_at')->exists()) {
                        $fail(__('validation.unique', ['attribute' => 'phone']));
                    }
                }
            ],
            'code' => ['required'],
            'role_id' => ['exists:roles,id'],
        ];
    }
    
    public function failedValidation(Validator $validator)
    {
        throw new ExceptionHandler($validator->errors()->first(), 422);
    }
}
