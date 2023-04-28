

<form  action="{{ route('dashboard-country.get-countries', ) }}" method="get"  class=" h-4 flex justify-around">


    @if($sortType == 'asc')
        <input type="hidden" name='name' value={{ $name }}>
        <input type="hidden" name='sort' value={{ $sortType }}>
        @if (request('search'))
            <input name="search" value="{{ request('search') }}" type="hidden" >
        @endif
        <button><img alt="up-arrow-icon" class="cursor-pointer  w-[13px] " src="{{  request('name') == $name && request('sort') == 'asc' ?  asset('images/up-fill.svg') :  asset('images/up.svg')  }}" /></button>

    @else
        <input type="hidden" name='name' value={{ $name }}>
        <input type="hidden" name='sort' value={{ $sortType }}>
        @if (request('search'))
            <input name="search" value="{{ request('search') }}" type="hidden" >
        @endif
        <button><img alt="down-arrow-icon" class=" cursor-pointer w-[13px]" src="{{  request('name') == $name && request('sort') == 'desc' ?  asset('images/down-fill.svg') :  asset('images/down.svg')  }}"/></button>
    @endif
</form>
