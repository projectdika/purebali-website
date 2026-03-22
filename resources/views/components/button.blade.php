@props([
    'variant' => 'primary',
    'href' => '#',
    'type' => 'a'
])

@php
    $baseClasses = 'px-8 py-2 rounded-2xl font-medium transition-all duration-300 text-lg inline-block text-center border-2';

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