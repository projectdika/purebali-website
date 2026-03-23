@props([
    'variant' => 'primary',
    'href' => '#',
    'type' => 'a'
])

@php
    $baseClasses = 'px-5 py-3 items-center rounded-2xl font-normal font-poppins transition-all duration-200 text-lg flex text-center border-2';

    $variants = [
        'primary' => 'bg-button text-white border-button 
                      hover:bg-transparent hover:text-button',
        
        'outline' => 'bg-transparent text-button border-button 
                      hover:bg-button hover:text-white'
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

<{{$type}} href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</{{$type}}>