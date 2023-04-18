<?php

namespace App\Http\Controllers;
use App\Http\Requests\RegisterRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;



class AuthController extends Controller
{
    public function register(): View
    {
        return view('register');
    }

    public function signUp(RegisterRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());

        VerifyUser::create([
            'token' => Str::random(60),
            'user_id' => $user->id
        ]);


        Mail::to($user->email)->send(new VerifyEmail($user));


        auth()->login($user);

        return redirect()->route('email-sent', ['user' => $user]);
    }


    public function verifyEmail($token): RedirectResponse
    {
        $verifiedUser = VerifyUser::where('token', $token)->first();
        if (isset($verifiedUser)) {
            $user = $verifiedUser->user;
            if (!$user->email_verified_at) {
                $user->email_verified_at = now();
                $user->save();
                return redirect()->route('success')->with('success', 'Your email has been verified');
            }

        }

        return redirect()->route('login')->with('error', 'Something went wrong!!');

    }



}
