@props(['sortType', 'name', 'src'])


<form  action="{{ route('dashboard-country.sort', ['sort' => $sortType, 'name' => $name]) }}" method="post" class=" h-4 flex justify-around">
    @csrf

    @if($sortType == 'asc')
        <button><img class="cursor-pointer  w-[13px] " src="{{  request('name') == $name && request('sort') == 'asc' ?  asset('images/up-fill.svg') :  asset('images/up.svg')  }}" /></button>
    @else
        <button><img class=" cursor-pointer w-[13px]" src="{{  request('name') == $name && request('sort') == 'desc' ?  asset('images/down-fill.svg') :  asset('images/down.svg')  }}"/></button>
    @endif
</form>
