<div class="pt-4 md:pt-10 px-4 md:px-28 min-h-screen pb-8">
    <header class="flex justify-between border-b border-dark-4 border-solid pb-6">
        <img src="{{ asset('images/logo.svg') }}" alt="logo" class="w-32 md:w-44 h-8 md:h-11">
        <div class="flex w-[50%] md:w-[30%] justify-evenly items-center">
            <x-dropdown></x-dropdown>
            <p class="hidden md:block text-sm-2 font-bold">{{ auth()->user()->name }}</p>
            <form action="{{ route('logout.perform') }}" method="post">
                @csrf
                <button class="hidden md:inline-block text-sm-2">{{ __('logout') }}</button>
            </form>
            <div class="md:hidden flex flex-col relative text-end" x-data="{ open: false }">
                <img src="{{ asset('images/menu-icon.svg') }}" alt="logo" @click="open = !open" class="cursor-pointer">
                <div class="absolute top-[120%] right-0 border border-solid border-gray rounded-md opacity-100 bg-white w-max " x-show="open">
                    <p class="cursor-pointer hover:bg-gray text-xs-1 font-bold p-2">{{ auth()->user()->name }}</p>
                    <form action="{{ route('logout.perform') }}" method="post">
                        @csrf
                        <button class="text-xs-1 hover:bg-gray w-full p-2">{{ __('logout') }}</button>
                    </form>
                </div>
            </div>

        </div>
    </header>

    <p class="text-lg md:text-xl text-dark md:mt-[60px] mt-12 mb-6">{{ __(("stats_title")) }}</p>
    <div class="flex mb-12 border-b border-dark-4 border-solid">
        <a class="cursor-pointer " href="{{ route('home') }}">
            <p  class=" {{ request()->routeIs('home')  ? 'border-b border-dark border-solid text-xs-3 md:text-sm-2 md:font-bold' : 'text-xs-1 md:text-sm-1'  }}  mr-6  pb-4">
                {{ __('worldwide') }}
            </p>
        </a>
        <a class="cursor-pointer " href="{{ route('dashboard-country.countries') }}">
            <p  class="{{ request()->routeIs('dashboard-country.countries') || request()->routeIs('dashboard-country.sort')  ? 'border-b border-dark border-solid text-xs-3 md:text-sm-2 md:font-bold' : 'text-xs-1 md:text-sm-1'  }} mr-6  pb-4">
                {{ __('country') }}
            </p>
        </a>
    </div>

    {{ $slot }}
</div>
