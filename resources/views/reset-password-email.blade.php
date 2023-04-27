
<x-layout>
    <div class="flex  justify-center h-screen pt-4 lg:pt-10  ">
        <div class="w-[343px] lg:w-[392px] flex flex-col  h-full lg:h-[460px]">
            <form action="{{ route('password.reset-email') }}" method="post">
                @csrf
            <div class="h-full lg:flex lg:flex-col">
                <img src="{{ asset('images/logo.svg') }}" alt="logo" class="w-32 lg:w-44 h-8 lg:h-11 lg:self-center">
                <p class="text-lg lg:text-xl text-dark mb-[40px] lg:mb-[60px] mt-[43px] lg:mt-[148px] text-center">{{ __('reset_password') }}</p>
                <x-input name="email" type="email" placeholder="{{ __('enter_email') }}" label="{{ __('email') }}"></x-input>
            </div>
            <button type="submit" class="btn-primary mb-[40px] lg:mb-0 self-center lg:text-sm-2 font-black">{{ Str::upper(__('reset_password')) }}</button>

        </form>
        </div>
    </div>
</x-layout>
