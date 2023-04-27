
<x-layout>
    <div class="flex  justify-center h-screen pt-4 md:pt-10  ">
        <div class="w-[343px] md:w-[392px] flex flex-col  h-full md:h-[460px]">
            <div class="h-full flex flex-col">
                <img src="{{ asset('images/logo.svg') }}" alt="logo-icon" class="w-32 md:w-44 h-8 md:h-11 md:self-center">
                <img src="{{ asset('images/check.gif') }}" alt="check-icon-gif" class="self-center mt-[60%]">
                <p class="text-sm-1 md:text-sm-4 text-dark  mt-6 text-center">{{ __("confirmation_email") }}</p>

            </div>

        </div>
    </div>
</x-layout>
