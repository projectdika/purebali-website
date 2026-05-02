<x-app-layout>
        <section class="relative border-b-8 border-primary  bg-black opacity-80 py-20 md:py-32 overflow-hidden ">
            <div class="absolute inset-0 opacity-20" style="background-image: url('{{ asset('assets/images/about.png') }}'); background-size: cover;"></div>
            
            <div class="container mx-auto px-6 relative z-10 flex flex-col md:flex-row justify-between items-center text-white">
                <h1 class="text-5xl md:text-7xl font-bold tracking-tight mb-4 md:mb-0">Pure Bali</h1>
                <div class="text-center md:text-left">
                    <p class="text-xl md:text-2xl font-semibold">Rasakan Bali</p>
                    <p class="text-xl md:text-2xl font-semibold">Melampaui Pulau</p>
                </div>
            </div>
        </section>

        <section class="pt-20 bg-[#FAF3E0]">
            <div class="container mx-auto px-6 flex flex-col-reverse md:flex-row items-center gap-12">
                <div class="w-full md:w-1/2 text-center md:text-right">
                    <p class="text-[#B08968] text-lg md:text-2xl leading-relaxed font-medium">
                        Menghadirkan cerita tentang Bali <br class="hidden md:block"> yang sesungguhnya. <br>
                        Tentang tradisi yang tetap hidup <br class="hidden md:block"> dari generasi ke generasi, <br>
                        tentang seni yang lahir dari jiwa <br class="hidden md:block"> yang penuh makna, <br>
                        dan tentang alam yang selalu <br class="hidden md:block"> menjaga harmoni kehidupan.
                    </p>
                </div>
                <div class="w-full md:w-1/2 flex justify-center md:justify-start">
                    <img src="{{ asset('assets/images/BlogPage.png') }}" alt="Logo Pure Bali" class="w-64 md:w-500 opacity-80">
                </div>
            </div>
        </section>

        <section class="py-20 bg-[#FAF3E0]">
            <div class="container mx-auto px-6 flex flex-col md:flex-row items-center gap-12">
                <div class="w-full md:w-1/2 flex justify-center md:justify-end">
                    <div class="w-full md:w-1/2 flex justify-center md:justify-start">
                        <img class="rounded-xl" src="{{ asset('assets/images/team.jpg') }}" alt="Team Photo" class="w-64 md:w-[600px] opacity-80 rounded-2xl shadow-lg">
                    </div>
                </div>
                <div class="w-full md:w-1/2 text-center md:text-left">
                    <p class="text-[#B08968] text-lg md:text-2xl leading-relaxed font-medium max-w-lg">
                        Di balik PureBali, ada tim <br class="hidden md:block">
                        yang bekerja dengan <br class="hidden md:block">
                        semangat yang sama. <br class="hidden md:block">
                        Semangat untuk bercerita, <br class="hidden md:block">
                        semangat untuk berkarya, <br class="hidden md:block">
                        dan semangat untuk <br class="hidden md:block">
                        memperkenalkan Bali <br class="hidden md:block">
                        kepada dunia.
                    </p>
                </div>
            </div>
        </section>
</x-app-layout>