<?php

namespace App\Http\Controllers;
use App\Http\Requests\Register\RegisterRequest;
use Illuminate\Http\RedirectResponse;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Login\LoginRequest;
use Illuminate\Support\Facades\Session;




class AuthController extends Controller
{
    public function signUp(RegisterRequest $request): RedirectResponse
    {
        $user = User::create($request->validated());

        Mail::to($user->email)->send(new VerifyEmail($user));

        return redirect()->route('email-sent');
    }


    public function verifyEmail($id): RedirectResponse
    {
        $verifiedUser = User::find($id);

        if (isset($verifiedUser)) {

            if (!$verifiedUser->email_verified_at) {
                $verifiedUser->email_verified_at = now();
                $verifiedUser->save();
                return redirect()->route('success')->with('success', 'Your email has been verified');
            }

        }

        return redirect()->route('login')->with('error', 'Something went wrong!!');

    }

    public function signIn( LoginRequest $request): RedirectResponse
    {
       $fieldType = filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';


       if(!auth()->attempt([$fieldType => $request->name, 'password' => $request->password]))
       {
            throw ValidationException::withMessages([
                'name' => __("wrong_credentials")
            ]);
       }

        if (Auth::user()->email_verified_at === null) {
            throw ValidationException::withMessages([
                'name' => 'Please verify your email to continue'
            ]);
        }

        Auth::login(Auth::user(),  $request->has('remember'));


        session()->regenerate();

      return redirect()->route('home');
    }

    public function logout(): RedirectResponse
    {

        Session::flush();

        Auth::logout();

        return redirect( route('login') );
    }

}
