{{-- props untuk slicing aja --}}
@props([

])


<nav class="font-poppins sticky flex px-10 py-4 justify-between items-center bg-secondary">
    <a href="">
        <img class="h-10 " src="{{asset('assets/images/logoTextColor.png')}}" alt="PureBali Logo">
    </a>

    <div class="flex justify-center gap-4">
        <a href="">Home</a>
        <a href="">Balinese Cultures</a>
        <a href="">About Us</a>
        <a href="">Admin Dashboard</a>
    </div>

    <div class="flex justify-center gap-4">
        <x-button variant="outline" class="h-10 rounded-xl font-normal p-3">Login</x-button>
        <x-button class="h-10  rounded-xl font-normal p-3">Register</x-button>
        <x-button variant="outline" class="h-10 fill-button transition-all hover:fill-white rounded-xl font-normal p-3">
            <p>Name</p>
            <svg class="size-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M297.4 438.6C309.9 451.1 330.2 451.1 342.7 438.6L502.7 278.6C515.2 266.1 515.2 245.8 502.7 233.3C490.2 220.8 469.9 220.8 457.4 233.3L320 370.7L182.6 233.4C170.1 220.9 149.8 220.9 137.3 233.4C124.8 245.9 124.8 266.2 137.3 278.7L297.3 438.7z"/></svg>
        </x-button>
        
    </div>
</nav>