
<x-layout>

    <div id="container"  style="display: table; margin: auto; height: 100vh;" >
        <img id="img" src="{{ asset('images/Landing.png') }}" alt="landing-page-image" style="display: table; margin: auto; margin-top: 16px; width: 300px; height: 241px">
        <p  style="display: table; margin: auto; font-size: 20px; line-height: 24px; font-weight: bold; font-family: Inter; ">{{ __('confirm_email') }}</p>
        <p  style="display: table; margin: auto; color: #808189; font-size: 16px; line-height: 19px; font-weight: 400; margin-bottom: 14px; font-family: Inter;">{{ __('verify_email_btn') }}</p>
        <a id="btn" href="{{ route('user.verify-email', ['id' => $user->id]) }}"
        style="display: table; margin: auto; line-height: 16px; font-size: 14px;  width: 300px; padding-top: 14px; padding-bottom: 14px; font-family: Inter;  text-decoration: none; color: #fff; background-color: #0FBA68; font-weight: 900; border-radius: 8px; text-align: center;">{{ __('verify_email') }}</a>
    </div>

</x-layout>
