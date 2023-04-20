<x-layout>
    <div class="pt-4 md:pt-10 px-4 md:px-28 min-h-full">
        <header class="flex justify-between border-b border-dark-4 border-solid pb-6">
            <img src="{{ asset('images/logo.svg') }}" alt="logo" class="w-32 md:w-44 h-8 md:h-11">
            <div class="flex w-[50%] md:w-[35%] justify-evenly items-center">
                    <x-dropdown></x-dropdown>

                <p class="hidden md:block text-sm-2 font-bold">Takeshi K.</p>
                <button class="hidden md:inline-block text-sm-2">{{ __('logout') }}</button>
                <img src="{{ asset('images/menu-icon.svg') }}" alt="logo" class="md:hidden">
            </div>
        </header>

        <p class="text-lg md:text-xl text-dark md:mt-[60px] mt-12 mb-6">{{ __(("stats_title")) }}</p>
        <div class="flex mb-12 border-b border-dark-4 border-solid">
            <p  class="text-xs-3 md:text-sm-2 md:font-bold  mr-6 border-b border-dark border-solid pb-4">{{ __('worldwide') }}</p>
            <p  class="text-xs-1 md:text-sm-1">{{ __('country') }}</p>
        </div>

        <div class="flex items-center md:justify-center md:border md:border-gray md:border-solid md:rounded w-max h-[48px] mb-6 md:mb-10">
            <img src="{{ asset('images/search.svg') }}" alt="search-icon" class="mr-4">
            <input name="search" type="text" placeholder="{{ __('search') }}" class="focus:outline-none">
        </div>



        <div class="border border-solid border-dark-4 rounded">
            <div class="bg-white rounded ">
                <table class="min-w-max w-full table-auto ">
                    <thead class="h-[56px]">
                        <tr class="bg-dark-4 text-xs-2 leading-normal pl-4">
                            <th class="px-3  text-left relative">{{ __('location') }} </th>
                            <th class="px-3  text-left">{{ __('new_cases') }} <img class="absolute right-[65%] top-[30%] cursor-pointer" src="{{ asset('images/sort.svg') }}"
                            onclick="{{ $data->sortBy('new_case') }}"/></th>
                            <th class="px-3  text-left">{{ __('death') }}</th>
                            <th class="px-3  text-left">{{ __('recover') }}</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs-1 h-[700px] overflow-y-auto bg-yellow">
                        <tr class="border-b border-solid border-dark-4 h-[56px]">
                            <td class="px-3  text-left">Worldwide</td>
                            <td class="px-3  text-left">{{ $new_case }}</td>
                            <td class="px-3 text-left">{{ $death }}</td>
                            <td class="px-3  text-left">{{ $recover }}</td>
                        </tr>
                         @foreach ($data as $country)

                            <tr class="border-b border-solid border-dark-4 h-[56px]">
                                <td class="px-3  text-left"> {{app()->getLocale() === 'en' ?  $country->name['en'] : $country->name['ka']  }} </td>
                                <td class="px-3  text-left">{{ $country->new_case }}</td>
                                <td class="px-3 text-left">{{ $country->death }}</td>
                                <td class="px-3  text-left">{{ $country->recover }}</td>
                            </tr>


                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
