
<x-layout>
    <div class="flex justify-center lg:block">
    <div class=" pt-4 lg:pt-10 px-4 lg:pl-28 min-h-full">
        <div class="flex justify-between w-full lg:w-[50%]">
            <img src="{{ asset('images/logo.svg') }}" alt="logo-icon" class="w-32 lg:w-44 h-8 lg:h-11">
            <x-dropdown></x-dropdown>
        </div>
        <p class="text-lg lg:text-xl text-dark lg:mt-[60px] mt-[43px] mb-[8px]">{{ __('welcome') }}</p>
        <p class="text-light-dark text-sm-1 lg:text-sm-4 mb-[24px]">{{ __('welcome_back') }}</p>

        <form method="POST" action="{{ route('login.sign-in') }}" class="w-[343px] lg:w-[392px]">
            @csrf
            <x-input name="name" type="text" placeholder="{{ __('enter_user') }}" label="{{ __('user_name') }}" />

            <x-input name="password" type="password" placeholder="{{ __('enter_password') }}" label="{{ __('password') }}" />

            <div class="flex justify-between items-center mt-[3%] mb-[4%]">
                <div class="flex items-center" >
                    <input type="checkbox" name="remember" class="accent-[#249E2C] h-4 w-4 mr-2">
                    <label for="remember" class="text-dark text-xs-2">{{ __('rememeber_device') }}</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-xs-2 text-blue">{{ __('recover_password') }}</a>
            </div>
            <button type="submit" class="btn-primary">{{ __('sign_in') }}</button>

            <p class="text-light-dark text-xs-1 text-center w-[100%] mt-[24px]">{{ __('account') }} <a href="{{ route('register') }}" class="text-dark text-xs-3">{{ __('signup_link') }}</a></p>
        </form>


    </div>
</div>
    <img src="{{ asset('images/img.png') }}" alt="vaccine-image" class="hidden lg:block absolute  right-0 top-0 w-[42%] h-full bg-cover">
</x-layout>
