<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as PasswordRules;


class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                PasswordRules::min(8)->letters()->symbols()->numbers()
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name required',
            'email.required' => 'Email required',
            'email.email' => 'Invalid email',
            'email.unique' => 'User already exists',
            'password.required' => 'Password required',
            'password' => 'Use strong password',
            'password.confirmed' => 'Password dont match',
        ];
    }
}
