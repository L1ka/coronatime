<x-layout>
    <div class="flex flex-col items-center h-screen lg:pb-8 ">
        <img src="{{ asset('Landing.svg') }}" alt="dashboard-worldwide-screen" class="mt-4 " >
        <p class="text-lg lg:text-xl text-dark lg:mt-[60px] mt-[43px] mb-[8px]">{{ __('confirmation_email') }}</p>
        <p class="text-light-dark text-sm-1 lg:text-sm-4 mb-[24px]">{{ __('verify_email_btn') }}</p>
        <button type="submit" class="btn-primary md:w-[392px]">{{ __('verify_email') }}</button>
    </div>

</x-layout>
