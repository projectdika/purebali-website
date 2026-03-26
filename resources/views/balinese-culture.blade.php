<x-app-layout>
    <main class="overflow-x-hidden min-h-screen bg-[#F3E9DC]">

{{-- BACKGROUND --}}
    <div class="w-full h-[300px] bg-color-secondary relative">
        <div class="w-full h-full bg-repeat bg-center opacity-100" 
            style="background-image: url('{{ asset('assets/images/HomeBackground.jpg') }}'); background-size: 50%">
    </div>

{{-- INPUT --}}
    <div class="w-[90%] mx-auto flex items-center gap-1 relative p-3 bg-color-secondary rounded-xl mt-0 max-w">
        <div class="flex-4 flex items-center h-12 px-4 bg-[#F3E9DC] px-3 py-1 rounded-lg border border-[#C37F43] gap-2">
         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" class="fill-[#C37F43] left-0"/>
        </svg>
        <x-input type = "text"  name = "search" id = "search" value = "{{ old('search') }}" placeholder="Cari Informasi Budaya" class="w-full border-none text-gray-800" />
    </div>

      <div class="flex-1 flex items-center h-12 px-4 bg-[#F3E9DC] px-3 py-1 rounded-lg border border-[#C37F43] gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M3.792 2.938A49.069 49.069 0 0 1 12 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 0 1 1.541 1.836v1.044a3 3 0 0 1-.879 2.121l-6.182 6.182a1.5 1.5 0 0 0-.439 1.061v2.927a3 3 0 0 1-1.658 2.684l-1.757.878A.75.75 0 0 1 9.75 21v-5.818a1.5 1.5 0 0 0-.44-1.06L3.13 7.938a3 3 0 0 1-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836Z" clip-rule="evenodd" class="fill-[#C37F43] left-0" />
        </svg>
    </div>

    <x-button type="submit" variant="primary" >
           Cari 
    </x-button>
    </div>


{{-- CARD --}}
    <div class="mt-5 mx-auto px-4 md:px-8 ">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <x-card title="Tari Baris Gede" category="Tarian Bali" image="public/assets/image/dummyCardImage.jpg" link="#" />

                <x-card title="Tari Baris Gede" category="Tarian Bali" image="public/assets/image/dummyCardImage.jpg" link="#" />

                <x-card title="Tari Baris Gede" category="Tarian Bali" image="public/assets/image/dummyCardImage.jpg" link="#" />

                <x-card title="Tari Baris Gede" category="Tarian Bali" image="public/assets/image/dummyCardImage.jpg" link="#" />

                <x-card title="Tari Baris Gede" category="Tarian Bali" image="public/assets/image/dummyCardImage.jpg" link="#" />

                <x-card title="Tari Baris Gede" category="Tarian Bali" image="public/assets/image/dummyCardImage.jpg" link="#" />

                <x-card title="Tari Baris Gede" category="Tarian Bali" image="public/assets/image/dummyCardImage.jpg" link="#" />

                <x-card title="Tari Baris Gede" category="Tarian Bali" image="public/assets/image/dummyCardImage.jpg" link="#" />

                <x-card title="Tari Baris Gede" category="Tarian Bali" image="public/assets/image/dummyCardImage.jpg" link="#" />
        </div>
    </div>

    </main>
</x-app-layout>