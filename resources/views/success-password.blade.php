
<x-layout>
    <div class="flex  justify-center h-screen pt-4 md:pt-10  ">
        <div class="w-[343px] md:w-[392px] flex flex-col  h-full  md:h-[65%]">
            <div class="h-full flex flex-col">
                <img src="{{ asset('images/logo.svg') }}" alt="logo" class="w-32 md:w-44 h-8 md:h-11 md:self-center">
                <img src="{{ asset('images/check.gif') }}" alt="logo" class="self-center mt-[60%]">
                <p class="text-sm-1 md:text-sm-4 text-dark  mt-6 text-center">{{ __('success_password') }}</p>

            </div>
            <a href="{{ route('login') }}"><button type="submit" class="btn-primary mb-[40px] md:mb-0  self-center md:text-sm-2 font-black">{{ __('login') }}</button></a>
        </div>

    </div>
</x-layout>
