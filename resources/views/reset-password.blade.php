<x-layout>
    <div class="flex  justify-center h-screen pt-4 md:pt-10  ">
        <div class="w-[343px] md:w-[392px] flex flex-col  h-full  md:h-[70%]">
            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <div class="h-full flex flex-col">
                    <img src="{{ asset('images/logo.svg') }}" alt="logo" class="w-32 md:w-44 h-8 md:h-11 md:self-center">
                    <p class="text-lg md:text-xl text-dark mb-[40px] md:mb-[60px] mt-[43px] md:mt-[148px] text-center">{{ __('reset_password') }}</p>

                    <x-input name="password" type="password" placeholder="{{ __('enter_new_password') }}" label="{{ __('new_password') }}"></x-input>
                    <x-input name="password_confirmation" type="password" placeholder="{{ __('repeat_password') }}" label="{{ __('repeat_password') }}"></x-input>
                    <input type="token" name='token' value="{{ $token }} " hidden>
                    <input type="email" name='email' value="{{ $email }} " hidden>
                </div>
                <button type="submit" class="btn-primary mb-[40px] md:mb-0  self-center md:text-sm-2 font-black">{{ __('save_changes') }}</button>
            </form>
        </div>
    </div>
</x-layout>
