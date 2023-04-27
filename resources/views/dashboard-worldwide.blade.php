<x-layout>
    <x-dashboard-layout>

        <div class="grid grid-cols-2 gap-4 justify-items-center md:grid-cols-3">
            <div class="col-span-2 md:col-span-1 bg-blue/[0.08] w-full h-[193px] md:h-[255px] rounded shadow-3xl flex flex-col items-center justify-evenly">
                <img src="{{ asset('images/diagram-blue.svg') }}" alt="diagram">
                <p class="text-sm-2 md:text-m">{{ __('new_cases') }}</p>
                <p class="text-xl md:text-2xl text-blue">{{ $sum['new_case'] }}</p>
            </div>

            <div  class="bg-green/[0.08] w-full h-[193px] md:h-[255px] rounded shadow-3xl flex flex-col items-center justify-evenly">
                <img src="{{ asset('images/diagram-green.svg') }}" alt="diagram">
                <p class="text-sm-2 md:text-m">{{ __('recover') }}</p>
                <p class="text-xl md:text-2xl text-green">{{ $sum['recover'] }}</p>
            </div>

            <div class="bg-yellow/[0.08] w-full h-[193px] md:h-[255px] rounded shadow-3xl flex flex-col items-center justify-evenly">
                <img src="{{ asset('images/diagram-yellow.svg') }}" alt="diagram">
                <p class="text-sm-2 md:text-m">{{ __('death') }}</p>
                <p class="text-xl md:text-2xl text-yellow">{{ $sum['death'] }}</p>
            </div>
        </div>
    </div>


    </x-dashboard-layout>
</x-layout>
