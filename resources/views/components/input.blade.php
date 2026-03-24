@props(['disabled' => false, 'type' => 'text', 'name', 'label' => null])

<div class="w-full">
    @if ($label) 
    {{-- Ini untuk label diatas kotak, contoh : Alamat Email --}}
        <label for="{{ $name }}" class="block text-4 font median text-black mb-[3.08px]">
            {{ $label }}
        </label>
    @endif

    <input
    {{-- Ini untuk inputan-inputan yang diperlukan, contoh : alamat email, nama, password, dll --}}
        type = "{{ $type }}"
        name = "{{ $name }}"
        id = "{{ $name }}"
        value = "{{ old($name) }}"
        @disabled($disabled)
        {{$attributes->merge (['class' => 'w-full px-[20.77px] py-[12.46px] bg-[#F3F3F5] rounded-xl focus:outline-none'])}}
    >

    @error( $name )
    {{-- Ini untuk peringatan, contoh : email wajib diisi --}}
        <p class="text-sm text-red-500 mt-1"> {{ $message }} </p>
    @enderror

</div>