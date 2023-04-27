<?php

namespace App\Http\Requests\Password;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'token' => ['required' ],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed','min:3'],
        ];
    }
}
