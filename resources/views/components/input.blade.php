@props(['disabled' => false, 'type' => 'text', 'name', 'label' => null])

<div class="mb-[24.99px]">
    @if ($label) 
    {{-- Ini untuk label diatas kotak, contoh : Alamat Email --}}
        <label for="{{ $name }}" class="block text-4 font median text-black mb-[3.08px]">
            {{ label }}
        </label>
    @endif

    <input
    {{-- Ini untuk inputan-inputan yang diperlukan, contoh : alamat email, nama, password, dll --}}
        type = "{{ $type }}"
        name = "{{ $name }}"
        id = "{{ $name }}"
        value = "{{ old($name) }}"
        @disabled($disabled)
        {{$attributes->merge (['class' => 'w-[558.57px] px-[20.77px] py-[12.46px] bg-[#F3F3F5] rounded-md focus:outline-none'])}}
    >

    @error( $name )
    {{-- Ini untuk peringatan, contoh : email wajib diisi --}}
        <p class="text-sm text-red-500 mt-1"> {{ $message }} </p>
    @enderror

</div>