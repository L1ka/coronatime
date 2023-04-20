<select name="lang" class="cursor-pointer absolute right-[50%] flex" onchange="window.location.href=this.value" >
    <option {{ app()->getLocale() === 'en' ? 'selected' : '' }}  value="{{ route('set-locale', ['locale' =>'en'] ) }}">{{ __('english') }}</option>
    <option {{ app()->getLocale() === 'ka' ? 'selected' : '' }} value="{{ route('set-locale', ['locale' =>'ka'] ) }}">{{ __('georgian') }}</option>
 </select>
