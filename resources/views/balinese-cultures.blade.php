<x-app-layout>
    <main class="overflow-x-hidden min-h-screen bg-secondary pb-20">

        <div class="w-full h-[250px] relative flex items-center justify-center">
            {{-- Background --}}
            <div class="absolute inset-0 bg-cover bg-center"
                 style="background-image: url('{{ asset('assets/images/HomeBackground.jpg') }}');">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>

            {{-- Search Bar --}}
            <form method="GET" action="{{ route('cultures.index') }}" class="w-[90%] mx-auto flex flex-row items-center gap-3 relative p-3 bg-secondary/80 backdrop-blur-sm rounded-xl max-w-7xl z-10 shadow-2xl">
                <div class="flex-[6] flex items-center h-14 md:h-16 w-full px-3 md:px-5 bg-white rounded-lg border border-[#D1D5DC] gap-2 md:gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-[#D1D5DC]">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
                    </svg>
                    <input type="text" name="search" id="search" placeholder="Cari Budaya..."
                           value="{{ request('search') }}"
                           class="w-full bg-transparent border-none focus:ring-0 focus:outline-none text-gray-800 placeholder-gray-500 text-base md:text-lg" />
                </div>
                <button type="submit" class="flex-none flex items-center justify-center h-14 md:h-16 w-14 md:w-16 bg-white rounded-full border border-[#D1D5DC] cursor-pointer hover:bg-secondary transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-14 md:size-16 fill-button hover:fill-primary hover:shadow-white duration-100 transition-all">
                    <path d="M8.25 10.875a2.625 2.625 0 1 1 5.25 0 2.625 2.625 0 0 1-5.25 0Z" />
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.125 4.5a4.125 4.125 0 1 0 2.338 7.524l2.007 2.006a.75.75 0 1 0 1.06-1.06l-2.006-2.007a4.125 4.125 0 0 0-3.399-6.463Z" clip-rule="evenodd" />
                    </svg>

                </button>
            </form>
        </div>

        <div class="mt-24 md:mt-16 mx-auto px-4 md:px-8 max-w-7xl">
            @if($materials->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 justify-items-center">
                    @foreach($materials as $material)
                        <x-card
                            :title="$material->title"
                            :category="$material->category->name"
                            :image="Storage::url($material->picture)"
                            :link="route('culture.show', $material->id)"
                        />
                    @endforeach
                </div>


                @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">Tidak ada budaya yang ditemukan.</p>
                </div>
                @endif
            </div>
            {{-- Pagination --}}
            <div class="px-5 mb-3 mt-6">
                {{ $materials->links() }}
            </div>
    </main>
</x-app-layout>
