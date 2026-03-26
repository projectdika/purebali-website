<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ini Halaman About</title>

    {{-- My Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-secondary font-poppins">
    <x-navbar></x-navbar>

    <main class="py-20">
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

        <section class="py-20 bg-[#FAF3E0]">
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
                        <img src="{{ asset('assets/images/BlogPageJS.png') }}" alt="Logo Pure Bali" class="w-64 md:w-[800px] opacity-80">
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
    </main>

    <x-footer></x-footer>
</body>
</html>