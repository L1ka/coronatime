<?php

namespace App\Http\Requests;

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
            'name' => ['required', 'unique:users'],
            'password' => ['required', 'confirmed'],
            'password_confirmation' => ['required', 'same:password']
        ];
    }
}
