<x-app-layout>
    <div class="min-h-screen bg-secondary py-8 px-4 font-poppins">
        <div class="max-w-2xl mx-auto">
            <div class="mb-6">
                <a href="#"
                   class="inline-flex items-center gap-2 px-4 py-2
                          border border-button text-button
                          rounded-lg text-sm font-medium
                          hover:bg-button hover:text-white
                          transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali
                </a>
            </div>

            <div class="bg-white rounded-xl p-8 mb-6 shadow-sm text-center">
                <div class="flex justify-center mb-4">
                    <div class="w-14 h-14 rounded-full bg-success-bg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-success" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>

                <h2 class="text-2xl font-semibold text-button mb-2">Kuis Selesai!</h2>
                <p class="text-sm text-primary/60 mb-2">Nilai</p>
                <p class="text-5xl font-bold text-button mb-3">67%</p>
                <p class="text-sm text-primary/60">2 dari 3 jawaban benar</p>
            </div>

            <h3 class="text-base font-semibold text-primary mb-3">Review Jawaban</h3>
            <div class="bg-danger-bg rounded-xl p-5 mb-3 shadow-sm border border-danger-border">

                <div class="flex items-start gap-2 mb-4">
                    <div class="w-5 h-5 rounded-full bg-danger-bg border border-danger-border
                                flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-danger" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </div>
                    <p class="text-sm text-primary font-medium leading-relaxed">
                        1. <strong>Tari Baris Gede</strong> Berasal dari.....
                    </p>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center justify-between px-3 py-2 rounded-lg
                                bg-success-bg border border-success-border">
                        <span class="text-sm text-primary">Bali</span>
                        <span class="text-xs text-success font-medium">Jawaban Benar</span>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 rounded-lg
                                bg-danger-bg border border-danger-border">
                        <span class="text-sm text-primary">Jawa Timur</span>
                        <span class="text-xs text-danger font-medium">Jawaban Anda</span>
                    </div>
                    <div class="bg-white flex items-center px-3 py-2 rounded-lg border border-card/40">
                        <span class="text-sm text-primary/60">Papua Nugini</span>
                    </div>
                    <div class="bg-white flex items-center px-3 py-2 rounded-lg border border-card/40">
                        <span class="text-sm text-primary/60">Makasar</span>
                    </div>
                </div>
            </div>

            <div class="bg-success-bg rounded-xl p-5 mb-3 shadow-sm border border-success-border">
                <div class="flex items-start gap-2 mb-4">
                    <div class="w-5 h-5 rounded-full bg-success-bg border border-success-border
                                flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-success" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <p class="text-sm text-primary font-medium leading-relaxed">
                        2. <strong>Tari Baris Gede</strong> merupakan tarian sakral dan monumental yang menjadi bagian inti dalam upacara....
                    </p>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center justify-between px-3 py-2 rounded-lg
                                bg-success-bg border border-success-border">
                        <span class="text-sm text-primary">Dewa Yadnya</span>
                        <span class="text-xs text-success font-medium">Jawaban Benar</span>
                    </div>
                    <div class="bg-white flex items-center px-3 py-2 rounded-lg border border-card/40">
                        <span class="text-sm text-primary/60">Pitra Yadnya</span>
                    </div>
                    <div class="bg-white flex items-center px-3 py-2 rounded-lg border border-card/40">
                        <span class="text-sm text-primary/60">Manusa Yadnya</span>
                    </div>
                    <div class="bg-white flex items-center px-3 py-2 rounded-lg border border-card/40">
                        <span class="text-sm text-primary/60">Rsi Yadnya</span>
                    </div>
                </div>
            </div>

            <div class="bg-success-bg rounded-xl p-5 mb-6 shadow-sm border border-success-border">
                <div class="flex items-start gap-2 mb-4">
                    <div class="w-5 h-5 rounded-full bg-success-bg border border-success-border
                                flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-success" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <p class="text-sm text-primary font-medium leading-relaxed">
                        3. Secara filosofis, tarian ini bukan sekadar pertunjukan fisik, melainkan sebuah bentuk persembahan tulus dan benteng perlindungan untuk
                    </p>
                </div>

                <div class="space-y-2">
                    <div class="flex items-center justify-between px-3 py-2 rounded-lg
                                bg-success-bg border border-success-border">
                        <span class="text-sm text-primary">Kesucian</span>
                        <span class="text-xs text-success font-medium">Jawaban Benar</span>
                    </div>
                    <div class="bg-white flex items-center px-3 py-2 rounded-lg border border-card/40">
                        <span class="text-sm text-primary/60">Kerahayuan</span>
                    </div>
                    <div class="bg-white flex items-center px-3 py-2 rounded-lg border border-card/40">
                        <span class="text-sm text-primary/60">Kesucian dan Keharmonisan</span>
                    </div>
                    <div class="bg-white flex items-center px-3 py-2 rounded-lg border border-card/40">
                        <span class="text-sm text-primary/60">Keharmonisan</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between mb-8">

                <a href="/Question"
                   class="inline-flex items-center gap-2 px-5 py-2.5
                          border border-button text-button
                          text-sm font-medium rounded-lg
                          hover:bg-button hover:text-white
                          transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Ulangi Kuis
                </a>

                <a href="{{route('welcome')}}"
                   class="inline-flex items-center gap-2 px-5 py-2.5
                          bg-button text-white border border-button
                          text-sm font-medium rounded-lg
                          hover:bg-secondary hover:text-button
                          active:scale-95 transition-all duration-200 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>

        </div>
    </div>
</x-app-layout>