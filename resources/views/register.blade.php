
<x-layout>
    <div class="flex justify-center lg:block">
        <div class=" pt-4 lg:pt-10 px-4 lg:pl-28 min-h-full">
            <div class="flex justify-between items-center">
                <img src="{{ asset('images/logo.svg') }}" alt="logo" class="w-32 lg:w-44 h-8 lg:h-11">
                <x-dropdown></x-dropdown>
            </div>
            <p class="text-lg lg:text-xl text-dark lg:mt-[60px] mt-[43px] mb-[8px]">{{ __('signup_welcome') }}</p>
            <p class="text-light-dark text-sm-1 lg:text-sm-4 mb-[24px]">{{ __('signup_title') }}</p>
            <form method="POST" action="{{ route('register.sign-up') }}" class="w-[343px] lg:w-[392px]">
                @csrf
                <x-input name="name" type="text" placeholder="{{ __('enter_username') }}" label="{{ __('user_name') }}" />

                <x-input name="email" type="email" placeholder="{{ __('enter_email') }}" label="{{ __('email') }}" />

                <x-input name="password" type="password" placeholder="{{ __('enter_password') }}" label="{{ __('password') }}" />

                <x-input name="password_confirmation" type="password" placeholder="{{ __('repeat_password') }}" label="{{ __('repeat_password') }}" />


                <button type="submit" class="btn-primary">{{ __('sign_up') }}</button>

                <p class="text-light-dark text-xs-1 text-center w-[100%] mt-[24px]">{{ __('have_account') }}  <a href="#" class="text-dark text-xs-3">{{ __("login") }}</a></p>
            </form>
        </div>

    </div>
    <img src="{{ asset('images/img.png') }}" alt="vaccine-photo" class="hidden lg:block absolute  right-0 top-0 w-[42%] h-full bg-cover">
</x-layout>
