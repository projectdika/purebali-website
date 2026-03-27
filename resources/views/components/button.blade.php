@props([
    'variant' => 'primary',
    'href' => '#',
    'tag' => 'a',
    'size' => 'baseClasses'
])

@php
    $sizes = [
        'baseClasses' =>  'px-5 py-3 items-center rounded-2xl font-normal font-poppins transition-all duration-200 text-lg flex text-center border-2',

        'md' => 'px-4 py-2 items-center rounded-2xl font-poppins transition-all duration-200 text-md flex text-center border'
];

    $variants = [
        'primary' => 'bg-button text-white border-button 
                      hover:bg-transparent hover:text-button',
        
        'outline' => 'bg-transparent text-button border-button 
                      hover:bg-button hover:text-white'
    ];

    $classes = ($sizes[$size] ?? $sizes['baseClasses']) . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

<{{$tag}} href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</{{$tag}}>