{{-- props untuk slicing aja --}}
@props([

])

<header x-data="{open: false}">
    <nav class="font-poppins fixed top-0 z-40 w-full flex px-10 py-4 justify-between items-center bg-secondary">
        <a href="">
            <img class="h-12 " src="{{asset('assets/images/logoTextColor.png')}}" alt="PureBali Logo">
        </a>

        <div class="hidden md:flex justify-center gap-8">
            <a class="hover:text-button transition-all duration-100" href="{{ route('welcome') }}">Home</a>
            <a class="hover:text-button transition-all duration-100" href="">Balinese Cultures</a>
            <a class="hover:text-button transition-all duration-100" href="{{ route('about') }}">About Us</a>
            <a class="hidden hover:text-button transition-all duration-100" href="">Admin Dashboard</a>
        </div>

        <div class="hidden md:flex justify-center gap-4">
            <x-button variant="outline" class="h-10 rounded-xl font-normal p-3">Log In</x-button>
            <x-button class="h-10  rounded-xl font-normal p-3">Sign In</x-button>
            <x-button variant="outline" class="hidden h-10 fill-button transition-all hover:fill-white rounded-xl font-normal p-3">
                <p>Name</p>
                <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z"/></svg>
            </x-button>
        </div>
        <button
        class="md:hidden"  
        type="button"
        aria-label="Toggle menu"
        :aria-expanded="open"
        aria-controls="mobile-drawer"
        @click="open = true"">
            <svg class="fill-button size-12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Pro v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2026 Fonticons, Inc.--><path d="M96 160C96 142.3 110.3 128 128 128L512 128C529.7 128 544 142.3 544 160C544 177.7 529.7 192 512 192L128 192C110.3 192 96 177.7 96 160zM96 320C96 302.3 110.3 288 128 288L512 288C529.7 288 544 302.3 544 320C544 337.7 529.7 352 512 352L128 352C110.3 352 96 337.7 96 320zM544 480C544 497.7 529.7 512 512 512L128 512C110.3 512 96 497.7 96 480C96 462.3 110.3 448 128 448L512 448C529.7 448 544 462.3 544 480z"/></svg>
        </button>
    </nav>

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click="open = false"
        class="fixed inset-0 bg-black/50 z-50 md:hidden"
        aria-hidden="true"
    ></div>

    {{-- Drawer --}}
    <div
        id="mobile-drawer"
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        @keydown.escape.window="open = false"
        class="fixed top-0 left-0 h-full w-72 bg-secondary z-50 shadow-xl md:hidden transform flex flex-col"
        role="dialog"
        aria-modal="true"
        aria-label="Mobile navigation"
    >
        <div class="flex items-center justify-between px-4 py-4 shadow-sm">
            <a href="{{ url('/') }}">
                <img class="h-12" src="{{asset('assets/images/logoTextColor.png')}}" alt="Logo PureBali">
            </a>
            <button
                type="button"
                @click="open = false"
                aria-label="Tutup menu"
                class="p-2 rounded-lg hover:bg-gray-100"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="size-8 stroke-button" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <nav class="flex flex-col justify-center items-center">
            <a href="" class="mt-10 font-medium text-button text-xl mb-10">Home</a>
            <a href="" class="font-medium text-button text-xl mb-10">Balinese Cultures</a>
            <a href="" class="font-medium text-button text-xl mb-10">About Us</a>
            <a href="" class="hidden font-medium text-button text-xl mb-10">Admin Dashboard</a>
            <a href="" class="hidden font-medium flex text-red-600 text-xl mb-10">
                <svg class="size-8 fill-red-600 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M224 160C241.7 160 256 145.7 256 128C256 110.3 241.7 96 224 96L160 96C107 96 64 139 64 192L64 448C64 501 107 544 160 544L224 544C241.7 544 256 529.7 256 512C256 494.3 241.7 480 224 480L160 480C142.3 480 128 465.7 128 448L128 192C128 174.3 142.3 160 160 160L224 160zM566.6 342.6C579.1 330.1 579.1 309.8 566.6 297.3L438.6 169.3C426.1 156.8 405.8 156.8 393.3 169.3C380.8 181.8 380.8 202.1 393.3 214.6L466.7 288L256 288C238.3 288 224 302.3 224 320C224 337.7 238.3 352 256 352L466.7 352L393.3 425.4C380.8 437.9 380.8 458.2 393.3 470.7C405.8 483.2 426.1 483.2 438.6 470.7L566.6 342.7z"/></svg>
                <p>Log Out</p>
            </a>
            <x-button
            class="mb-10 py-2" 
            variant="outline"
            >Log In</x-button>
            <x-button
            class="py-2" 
            variant="primary"
            >Sign In</x-button>
        </nav>
        
    </div>
</header>