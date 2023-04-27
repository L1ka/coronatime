<?php

namespace App\Http\Controllers;

use App\Http\Requests\Password\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    public function email(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email']);



        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? redirect()->route('email-sent')
                    : back()->withErrors(['email' => __($status)]);
    }


    public function reset(string $token, Request $request): View
    {
        return view('reset-password', ['token' => $token, 'email' => $request->email]);
    }



    public function update( ResetPasswordRequest $request): RedirectResponse
    {


        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => $password
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('password-success')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }
}
