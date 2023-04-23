<?php

namespace App\Http\Requests\Login;


use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $column = filter_var($this->request->all()['name'], FILTER_VALIDATE_EMAIL) ? 'exists:users,email' : 'exists:users,name';

        return [
            'name' => ['required', $column],
            'password' => ['required'],
        ];
    }

}
