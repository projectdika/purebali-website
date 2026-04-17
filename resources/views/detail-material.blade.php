<x-app-layout>
    <main class="w-full overflow-x-hidden min-h-screen bg-secondary">

        <div class="w-full h-full sm:h-64 md:h-[400px] lg:h-[500px] bg-black relative overflow-hidden">
            <div class="aspect-16/10 w-full h-full mx-auto bg-cover opacity-80"
                style="background-image: url('{{ Storage::url($material->picture) }}');">
            </div>
            <div class="absolute inset-0 bg-black/30"></div>

            <div class="absolute inset-0 flex flex-col justify-end p-8 md:p-16 lg:p-20 z:10 gap-6">
                <div class="max-w-7xl mx-auto w-full flex flex-col gap-4">
                    <a href="{{ route('cultures.index') }}" class="flex items-center gap-3 group w-fit">
                        <div class="flex items-center justify-center h-10 w-10 rounded-lg text-white">
                            <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"></path>
                            </svg>
                        </div>
                        <h2 class="font-semibold text-white font-poppins">Kembali ke Daftar Budaya</h2>
                    </a>

                    <div class="bg-button text-white px-4 py-2 rounded-md w-fit flex gap-2 items-center">
                        <div class="items-center justify-center h-5 w-5 text-white">
                            <svg data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"></path>
                            </svg>
                        </div>
                        <h2 class="font-semibold text-white text-center font-poppins">{{ $material->category->name }}</h2>
                    </div>

                    <h1 class="text-4xl md:text-6xl font-bold text-white font-poppins">{{ $material->title }}</h1>
                </div>
            </div>
        </div>


        <div class="max-w-7xl mx-auto px-6 py-16 mt-1 relative">
            <div class="flex flex-col lg:flex-row gap-12">
                <div class="flex-3 bg-secondary rounded-lg border border-button gap-5 mt-0 p-8 md:p-10 font-poppins">
                    {!! nl2br(e($material->description)) !!}
                </div>

                @if($quiz)
                <div class="w-full lg:w-90 lg:sticky lg:top-24">
                    <div class="bg-button rounded-lg text-white flex flex-col justify-center items-center p-8 md:p-10">
                        <h3 class="text-2xl font-bold mb-4 font-poppins">Waktu Kuis</h3>
                        <p class="text-md mb-8 font-poppins">Uji pemahaman kamu di kuis ini. Dan dapatkan skor terbaik kamu.</p>
                        <a href="{{ route('quiz.start', $quiz->id) }}" class="text-button bg-white text-lg py-3 rounded-xl font-semibold hover:bg-secondary  px-8 duration-100 transition-all font-poppins">Mulai</a>
                    </div>
                </div>
                @else
                <div class="w-full lg:w-90 lg:sticky lg:top-24">
                    <div class="bg-gray-200 rounded-lg text-gray-600 flex flex-col justify-center items-center p-8 md:p-10">
                        <h3 class="text-2xl font-bold mb-4 font-poppins">Belum Ada Kuis</h3>
                        <p class="text-md mb-8 font-poppins text-center">Maaf, kuis untuk materi ini belum tersedia.</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </main>
</x-app-layout>
