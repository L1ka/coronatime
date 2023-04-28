

<x-layout>
    <x-dashboard-layout>

         <form action="" method="get">
            <div class="flex items-center md:justify-center md:border md:border-gray md:border-solid md:rounded md:w-fit  mb-6 md:mb-10 md:p-2">
                <img src="{{ asset('images/search.svg') }}" alt="search-icon" class="mr-4">
                <input name="search" type="text" value="{{ request('search') }}" placeholder="{{ __('search') }}" class="focus:outline-none" >
            </div>
            @if (request('name'))
                 <input name="name" value="{{ request('name') }}" type="hidden" >
            @endif
            @if (request('sort'))
                <input name="sort" value="{{ request('sort') }}" type="hidden" >
            @endif

        </form>



        <div class="pt-4 md:pt-10 ">
            <table class="text-left max-w-[300px] md:min-w-full bg-white border border-solid border-dark-4">
                <thead  class="bg-dark-4 flex text-dark w-full h-[56px]">
                    <tr class="flex w-full mb-4">
                        <th class="pt-2 md:p-4 w-1/4" >
                            <div class="flex items-center">
                                <p class="text-xs-1 md:text-sm-2 font-bold mr-2 md:mr-4 break-all">{{ __('location') }}</p>
                                <div>
                                    <x-sort-form sortType='asc' name='name' search=""></x-sort-form>
                                    <x-sort-form sortType='desc' name='name' search=""></x-sort-form>
                                </div>
                            </div>
                        </th>
                        <th class="pt-2 md:p-4 w-1/4" >
                            <div class="flex items-center">
                                <p class="text-xs-1 md:text-sm-2 font-bold md:mr-4 break-all">{{ __('new_cases') }}</p>
                                <div>
                                    <x-sort-form sortType='asc' name='new_case' search=""></x-sort-form>
                                    <x-sort-form sortType='desc' name='new_case' search=""></x-sort-form>
                                </div>
                            </div>
                        </th>
                        <th class="pt-2 md:p-4 w-1/4">
                            <div class="flex items-center">
                                <p class=" text-xs-1 md:text-sm-2 font-bold mr-2 md:mr-4 break-all">{{ __('death') }}</p>
                                <div>
                                    <x-sort-form sortType='asc' name='death' search=""></x-sort-form>
                                    <x-sort-form sortType='desc' name='death' search=""></x-sort-form>
                               </div>
                            </div>
                        </th>
                        <th class="pt-2 md:p-4 w-1/4">
                            <div class="flex items-center">
                                <p class="text-xs-1 md:text-sm-2 font-bold mr-2 md:mr-4 break-all">{{ __('recover') }}</p>
                                <div>
                                    <x-sort-form sortType='asc' name='recover' search=""></x-sort-form>
                                    <x-sort-form sortType='desc' name='recover' search=""></x-sort-form>
                                </div>
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-grey-light flex flex-col items-center  overflow-y-scroll  w-full h-[50vh] scrollbar-thin scrollbar-thumb-[#808189] " >

                    <tr class="border-b border-solid border-dark-4 flex w-full">
                        <td class="p-4 w-1/4">Worldwide</td>
                        <td class="p-4 w-1/4">{{ $sum['new_case'] }}</td>
                        <td class="p-4 w-1/4">{{ $sum['death']  }}</td>
                        <td class="p-4 w-1/4">{{ $sum['recover']  }}</td>
                    </tr>
                        @foreach ($data as $country)

                        <tr class="border-b border-solid border-dark-4 flex w-full">
                            <td class="p-4 w-1/4 break-all"> {{ $country->name }} </td>
                            <td class="p-4 w-1/4">{{ $country->new_case }}</td>
                            <td class="p-4 w-1/4">{{ $country->death }}</td>
                            <td class="p-4 w-1/4">{{ $country->recover }}</td>
                        </tr>


                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

    </x-dashboard-layout>

</x-layout>
