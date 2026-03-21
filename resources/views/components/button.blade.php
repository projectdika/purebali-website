@props([
    'variant' => 'primary',
    'href' => '#'
])

@php
    $baseClasses = 'px-8 py-2 rounded-2xl font-medium transition-all duration-300 text-lg inline-block text-center border-2';

    $variants = [
        'primary' => 'bg-[#C5834A] text-white border-[#C5834A] 
                      hover:bg-transparent hover:text-[#C5834A]',
        
        'outline' => 'bg-transparent text-[#C5834A] border-[#C5834A] 
                      hover:bg-[#C5834A] hover:text-white'
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>