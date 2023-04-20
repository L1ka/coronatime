<x-layout>
    <div class="pt-4 md:pt-10 px-4 md:px-28 min-h-full">
        <header class="flex justify-between border-b border-dark-4 border-solid pb-6">
            <img src="{{ asset('images/logo.svg') }}" alt="logo" class="w-32 md:w-44 h-8 md:h-11">
            <div class="flex w-[50%] md:w-[35%] justify-evenly items-center">
                <div class="flex items-center ">
                    <p class="mr-2 text-sm-2">{{ __('english') }}</p>
                    <img src="{{ asset('images/down-arrow.svg') }}" >
                </div>
                <p class="hidden md:block text-sm-2 font-bold">{{ auth()->user()->name }}</p>
                <form action="{{ route('logout.perform') }}" method="post">
                    @csrf
                    <button class="hidden md:inline-block text-sm-2">{{ __('logout') }}</button>
                </form>

                <img src="{{ asset('images/menu-icon.svg') }}" alt="logo" class="md:hidden">
            </div>
        </header>

        <p class="text-lg md:text-xl text-dark md:mt-[60px] mt-12 mb-6">{{ __(("stats_title")) }}</p>
        <div class="flex mb-12">
            <p  class="text-xs-3 md:text-sm-2 md:font-bold  mr-6 border-b border-dark border-solid pb-4">{{ __('worldwide') }}</p>
            <p  class="text-xs-1 md:text-sm-1">{{ __('country') }}</p>
        </div>
        <div class="grid grid-cols-2 gap-4 justify-items-center md:grid-cols-3">
            <div class="col-span-2 md:col-span-1 bg-blue/[0.08] w-full h-[193px] md:h-[255px] rounded shadow-3xl flex flex-col items-center justify-evenly">
                <img src="{{ asset('images/diagram-blue.svg') }}" alt="diagram">
                <p class="text-sm-2 md:text-m">{{ __('new_cases') }}</p>
                <p class="text-xl md:text-2xl text-blue">715,523</p>
            </div>

            <div  class="bg-green/[0.08] w-full h-[193px] md:h-[255px] rounded shadow-3xl flex flex-col items-center justify-evenly">
                <img src="{{ asset('images/diagram-green.svg') }}" alt="diagram">
                <p class="text-sm-2 md:text-m">{{ __('recover') }}</p>
                <p class="text-xl md:text-2xl text-blue">715,523</p>
            </div>

            <div class="bg-yellow/[0.08] w-full h-[193px] md:h-[255px] rounded shadow-3xl flex flex-col items-center justify-evenly">
                <img src="{{ asset('images/diagram-yellow.svg') }}" alt="diagram">
                <p class="text-sm-2 md:text-m">{{ __('death') }}</p>
                <p class="text-xl md:text-2xl text-blue">0</p>
            </div>
        </div>
    </div>

</x-layout>
