
<div class="flex flex-col mb-[5%]">
    <label for="{{ $name }}" class="text-dark text-xs-3 lg:text-sm-2 lg:font-bold mb-[3%]">{{ $label }}</label>
    <div class="relative">

        <input type="{{ $type }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            value="{{ old($name) }}"
            class="input {{ !$errors->has($name) && old($name) !== null ? 'border-green' : "" }} {{ $errors->has($name)  ? 'border-red' : "" }}" >

        <img src="{{ asset('images/valid.svg') }}"
            alt="check-icon"
            class=" {{ !$errors->has($name) && old($name) ? 'block' : "hidden" }} w-4 absolute right-6 top-[30%]">
    </div>
    @error( $name )
        <p class="flex text-xs-2 text-red">
            <img src="{{ asset('images/error.svg') }}" class="mr-4" alt="error-icon" />{{ $message }}
        </p>
    @enderror
</div>
