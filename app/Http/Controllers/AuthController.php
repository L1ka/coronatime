<?php

namespace App\Http\Controllers;
use App\Http\Requests\Register\RegisterRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\VerifyUser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Login\LoginRequest;




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

    public function login(): View
    {
        return view('login');
    }



}
