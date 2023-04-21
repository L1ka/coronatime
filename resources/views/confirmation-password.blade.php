

<x-layout>

    <div id="container"  style="display: flex; flex-direction: column; align-items: center; height: 100vh;" >
        <img id="img" src="{{ asset('images/Landing.png') }}" alt="dashboard-worldwide-screen" style=" margin-top: 16px; width: 300px; height: 241px">
        <p  style=" font-size: 20px; line-height: 24px; font-weight: bold; font-family: Inter; ">{{ __('confirmation_password') }}</p>
        <p  style=" color: #808189; font-size: 16px; line-height: 19px; font-weight: 400; margin-bottom: 14px; font-family: Inter;">{{ __('verify_password_btn') }}</p>
        <a id="btn" href="{{ route('password.reset', ['token' => $token, 'email' => $email]) }}"
        style="line-height: 16px; font-size: 14px;  width: 300px; padding-top: 14px; padding-bottom: 14px; font-family: Inter;  text-decoration: none; color: #fff; background-color: #0FBA68; font-weight: 900; border-radius: 8px; text-align: center;">{{ __('verify_password') }}</a>
    </div>

</x-layout>
