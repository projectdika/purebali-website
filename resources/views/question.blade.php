<x-app-layout>
    <div class="min-h-screen bg-secondary py-8 px-4 font-poppins">
        <div class="max-w-2xl mx-auto">
            <div class="mb-6">
                <a href="#"
                   class="inline-flex items-center gap-2 px-4 py-2 border border-button text-button rounded-lg text-sm font-medium hover:bg-button hover:text-white transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali
                </a>
            </div>

            <form action="#" method="POST">
                <div class="bg-white rounded-xl p-6 mb-4 shadow-sm">
                    <p class="text-primary text-sm font-medium leading-relaxed mb-5">
                        1. <strong>Tari Baris Gede</strong> Berasal dari.....
                    </p>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jawaban[0]" value="a" checked
                                   class="w-4 h-4 accent-button cursor-pointer">
                            <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">Bali</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jawaban[0]" value="b"
                                   class="w-4 h-4 accent-button cursor-pointer">
                            <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">Jawa Timur</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jawaban[0]" value="c"
                                   class="w-4 h-4 accent-button cursor-pointer">
                            <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">Papua Nugini</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jawaban[0]" value="d"
                                   class="w-4 h-4 accent-button cursor-pointer">
                            <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">Makasar</span>
                        </label>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 mb-4 shadow-sm">
                    <p class="text-primary text-sm font-medium leading-relaxed mb-5">
                        2. <strong>Tari Baris Gede</strong> merupakan tarian sakral dan monumental yang menjadi bagian inti dalam upacara....
                    </p>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jawaban[1]" value="a" checked
                                   class="w-4 h-4 accent-button cursor-pointer">
                            <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">Dewa Yadnya</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jawaban[1]" value="b"
                                   class="w-4 h-4 accent-button cursor-pointer">
                            <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">Pitra Yadnya</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jawaban[1]" value="c"
                                   class="w-4 h-4 accent-button cursor-pointer">
                            <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">Manusa Yadnya</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jawaban[1]" value="d"
                                   class="w-4 h-4 accent-button cursor-pointer">
                            <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">Rsi Yadnya</span>
                        </label>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 mb-4 shadow-sm">
                    <p class="text-primary text-sm font-medium leading-relaxed mb-5">
                        3. Secara filosofis, tarian ini bukan sekadar pertunjukan fisik, melainkan sebuah bentuk persembahan tulus dan benteng perlindungan untuk
                    </p>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jawaban[2]" value="a" checked
                                   class="w-4 h-4 accent-button cursor-pointer">
                            <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">Kesucian</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jawaban[2]" value="b"
                                   class="w-4 h-4 accent-button cursor-pointer">
                            <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">Kerahayuan</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jawaban[2]" value="c"
                                   class="w-4 h-4 accent-button cursor-pointer">
                            <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">Kesucian dan Keharmonisan</span>
                        </label>
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="radio" name="jawaban[2]" value="d"
                                   class="w-4 h-4 accent-button cursor-pointer">
                            <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">Keharmonisan</span>
                        </label>
                    </div>
                </div>

                <div class="flex justify-end mt-4 mb-8">
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-5 py-2.5
                                   bg-button text-white border border-button
                                   text-sm font-medium rounded-lg
                                   hover:bg-secondary hover:text-button
                                   active:scale-95 transition-all duration-200 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 " fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Kirim jawaban
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>