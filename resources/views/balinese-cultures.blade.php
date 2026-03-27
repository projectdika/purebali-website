<x-app-layout>
    <main class="overflow-x-hidden min-h-screen bg-secondary pb-20">

        <div class="w-full h-[250px] relative flex items-center justify-center">
            <div class="absolute inset-0 bg-cover bg-center" 
                 style="background-image: url('{{ asset('assets/images/HomeBackground.jpg') }}');">
                <div class="absolute inset-0 bg-black/40"></div> 
            </div>

            <div class="w-[90%] mx-auto flex flex-row items-center gap-3 relative p-3 bg-secondary/80 backdrop-blur-sm rounded-xl max-w-7xl z-10 shadow-2xl">
                
                <div class="flex-[6] flex items-center h-14 md:h-16 w-full px-3 md:px-5 bg-white rounded-lg border border-[#D1D5DC] gap-2 md:gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-[#D1D5DC]">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                    </svg>
                    <input type="text" name="search" id="search" placeholder="Cari Budaya..." 
                           class="w-full bg-transparent border-none focus:ring-0 focus:outline-none text-gray-800 placeholder-gray-500 text-base md:text-lg" />
                </div>

                <div class="flex-none flex items-center justify-center h-14 md:h-16 w-14 md:w-20 bg-white rounded-lg border border-[#D1D5DC] cursor-pointer hover:bg-secondary transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-[#99A1AF]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="mt-24 md:mt-16 mx-auto px-4 md:px-8 max-w-7xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center">
                <x-card title="Tari Baris Gede" category="Tarian Bali" image="{{ asset('assets/images/dummyCardImage.jpg') }}" link="/detail-material" />
                <x-card title="Tari Baris Gede" category="Tarian Bali" image="{{ asset('assets/images/dummyCardImage.jpg') }}" link="/detail-material" />
                <x-card title="Tari Baris Gede" category="Tarian Bali" image="{{ asset('assets/images/dummyCardImage.jpg') }}" link="/detail-material" />
                <x-card title="Tari Baris Gede" category="Tarian Bali" image="{{ asset('assets/images/dummyCardImage.jpg') }}" link="/detail-material" />
                <x-card title="Tari Baris Gede" category="Tarian Bali" image="{{ asset('assets/images/dummyCardImage.jpg') }}" link="/detail-material" />
                <x-card title="Tari Baris Gede" category="Tarian Bali" image="{{ asset('assets/images/dummyCardImage.jpg') }}" link="/detail-material" />
            </div>
        </div>

    </main>
</x-app-layout>