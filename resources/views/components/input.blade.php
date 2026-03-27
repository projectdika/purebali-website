@props(['disabled' => false, 'type' => 'text', 'name', 'label' => null])

<div class="w-full">
    @if ($label) 
    {{-- Ini untuk label diatas kotak, contoh : Alamat Email --}}
        <label for="{{ $name }}" class="block text-sm font-semibold text-black mb-[3.08px]">
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
        {{$attributes->merge (['class' => 'w-full p-3 text-sm bg-input rounded-xl focus:outline-button outline-1 outline-input'])}}
    >

    @error( $name )
    {{-- Ini untuk peringatan, contoh : email wajib diisi --}}
        <p class="text-sm text-red-500 mt-1"> {{ $message }} </p>
    @enderror

</div>