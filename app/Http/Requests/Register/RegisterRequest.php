<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email','unique:users'],
            'name' => ['required', 'unique:users', 'min:3'],
            'password' => ['required', 'confirmed', 'min:3'],
            'password_confirmation' => ['required', 'same:password']
        ];
    }
}
