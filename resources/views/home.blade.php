<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ asset('assets/images/favico.png') }}">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

            <style>
                :root {
                    --swiper-navigation-color: #5E3023;
                    --swiper-theme-color: #5E3023;
                }

                .bali-pattern {
                    position: relative;
                    background-image: url('{{ asset("assets/images/home.png") }}');
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    overflow: hidden;
                    min-height: 400px;
                }

                .bali-pattern::before {
                    content: "";
                    position: absolute;
                    inset: 0;
                    background-color: rgba(113, 84, 55, 0.6);
                    z-index: 0;
                }

                .bali-pattern > div {
                    position: relative;
                    z-index: 10;
                }

                .swiper {
                    width: 100%;
                    padding-top: 20px !important;
                    padding-bottom: 60px !important; /* Ruang extra untuk shadow card */
                }

                .swiper-button-next, .swiper-button-prev {
                    background-color: white;
                    width: 45px !important;
                    height: 45px !important;
                    border-radius: 50%;
                    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                    top: 50% !important;
                    transform: translateY(-50%);
                    z-index: 10;
                    transition: all 0.3s ease;
                }

                .swiper-button-next:hover, .swiper-button-prev:hover {
                    background-color: #f8f8f8;
                    transform: translateY(-50%) scale(1.05);
                }

                .swiper-button-next::after, .swiper-button-prev::after {
                    font-size: 18px !important;
                    font-weight: bold;
                }

                /* Responsive Adjustment for Navigation */
                @media (max-width: 640px) {
                    .swiper-button-next, .swiper-button-prev {
                        width: 38px !important;
                        height: 38px !important;
                    }
                    .swiper-button-prev {
                        left: -4px !important;
                    }
                    .swiper-button-next {
                        right: -4px !important;
                    }
                    .swiper-button-next::after, .swiper-button-prev::after {
                        font-size: 14px !important;
                    }
                    .swiper-slide {
                        display: flex !important;
                        justify-content: center !important;
                    }
                }
            </style>
    </head>
    <body>
        <x-navbar></x-navbar>

        <main>
            <section class="bali-pattern text-white py-50 md:py-50 font-poppins">
                <div class="container mx-auto px-6 text-center">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-semibold tracking-tight mb-4">
                        Mari Mengenal Dekat <br> Budaya Bali
                    </h1>

                    <p class="text-xl md:text-2xl text-[#FAF3E0] mb-12 mx-auto">
                        Pengalaman Liburan yang Tak Terlupakan Menanti Kamu
                    </p>

                    <form method="get" action="{{ route('cultures.index') }}">
                    <div class="relative max-w-xl mx-auto">
                        <input name="search" id="search" value="{{ request('search') }}" type="text" placeholder="Telusuri Budaya..." class="w-full bg-white text-[#715437] px-6 py-4 rounded-xl pl-14 pr-32 focus:outline-none focus:ring-2 focus:ring-[#B08968]">
                        <div class="absolute left-5 top-1/2 -translate-y-1/2 text-[#715437]">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <button type="submit" class="absolute right-2 inset-y-1.5 cursor-pointer bg-button hover:bg-primary duration-100 transition-all text-white px-8 rounded-xl">
                            Cari
                        </button>
                    </div>
                    </form>
            </section>

            <section class="py-16 bg-secondary font-poppins jus">
                <div class="container mx-auto px-6 py-10">
                    <div class="text-center mb-12">
                        <h3 class="text-3xl font-bold text-[#715437]">Budaya Terkini</h3>
                        <p class="text-[#B08968]">Telusuri Detail Budaya Terkini</p>
                    </div>

                    <div class="relative px-2 md:px-12">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach($materials as $item)
                                    <div class="swiper-slide flex justify-center items-center">
                                        <x-card
                                            :title="$item->title"
                                            :category="$item->category->name"
                                            :link="route('culture.show', $item->id)"
                                            :image="Storage::url($item->picture)"
                                        />
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="swiper-button-prev left-0! md:-left-2! "></div>
                        <div class="swiper-button-next right-0! md:-right-2!"></div>
                    </div>

                        <div class="mt-20 max-w-4xl mx-auto text-center font-semibold">
                            <p class="text-[#B08968] leading-relaxed">
                                Bali bukan sekadar destinasi. Ia adalah sebuah simfoni keseimbangan. Di balik kanvas putih ombaknya dan kokohnya ukiran kayu jati yang gelap, terdapat filosofi hidup yang menjaga harmoni antara manusia, alam, dan Sang Pencipta.
                            </p>
                            <hr class="mt-8 border-[#B08968]/60 w-3/4 mx-auto">
                        </div>
                    </div>
                </div>
            </section>

            {{-- Kenapa Pure Bali Section --}}
            <section class="py-20 bg-white font-poppins overflow-hidden">
                <div class="container mx-auto px-6">
                    <div class="text-center mb-16">
                        <p class="text-button font-semibold tracking-widest uppercase text-sm mb-3">Keunggulan Kami</p>
                        <h2 class="text-3xl md:text-4xl font-bold text-primary">Kenapa Pure Bali?</h2>
                        <p class="text-[#B08968] mt-3 max-w-2xl mx-auto leading-relaxed">
                            Kami hadir untuk melestarikan dan memperkenalkan kekayaan budaya Bali kepada dunia dengan konten yang lengkap, interaktif, dan penuh makna.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                        {{-- Card 1: Gratis --}}
                        <div class="group bg-secondary rounded-2xl p-8 text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                            <div class="w-16 h-16 mx-auto mb-5 bg-button/15 rounded-2xl flex items-center justify-center group-hover:bg-button/25 transition-colors duration-300">
                                <svg class="w-8 h-8 text-button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5a17.92 17.92 0 0 1-8.716-2.247m0 0A9 9 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-primary mb-2">Akses Gratis</h3>
                            <p class="text-[#8B7355] text-sm leading-relaxed">
                                Semua materi budaya Bali dapat diakses tanpa biaya. Pendidikan budaya untuk semua kalangan.
                            </p>
                        </div>

                        {{-- Card 2: Konten Lengkap --}}
                        <div class="group bg-secondary rounded-2xl p-8 text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                            <div class="w-16 h-16 mx-auto mb-5 bg-button/15 rounded-2xl flex items-center justify-center group-hover:bg-button/25 transition-colors duration-300">
                                <svg class="w-8 h-8 text-button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-primary mb-2">Konten Lengkap</h3>
                            <p class="text-[#8B7355] text-sm leading-relaxed">
                                Mulai dari upacara adat, tarian, hingga arsitektur, materi dikurasi dengan sumber terpercaya dan mendalam.
                            </p>
                        </div>

                        {{-- Card 3: Kuis Interaktif --}}
                        <div class="group bg-secondary rounded-2xl p-8 text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                            <div class="w-16 h-16 mx-auto mb-5 bg-button/15 rounded-2xl flex items-center justify-center group-hover:bg-button/25 transition-colors duration-300">
                                <svg class="w-8 h-8 text-button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-primary mb-2">Kuis Interaktif</h3>
                            <p class="text-[#8B7355] text-sm leading-relaxed">
                                Uji pemahamanmu melalui kuis interaktif yang seru dan edukatif di setiap materi budaya.
                            </p>
                        </div>

                        {{-- Card 4: Komunitas --}}
                        <div class="group bg-secondary rounded-2xl p-8 text-center hover:shadow-xl hover:-translate-y-2 transition-all duration-300">
                            <div class="w-16 h-16 mx-auto mb-5 bg-button/15 rounded-2xl flex items-center justify-center group-hover:bg-button/25 transition-colors duration-300">
                                <svg class="w-8 h-8 text-button" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-bold text-primary mb-2">Untuk Semua</h3>
                            <p class="text-[#8B7355] text-sm leading-relaxed">
                                Dirancang untuk pelajar, wisatawan, dan siapa saja yang ingin mengenal Bali lebih dalam.
                            </p>
                        </div>

                    </div>
                </div>
            </section>
        </main>

        <x-footer></x-footer>

        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var swiper = new Swiper(".mySwiper", {
                    slidesPerView: 1,
                    centeredSlides: true,
                    spaceBetween: 30,
                    loop: true,
                    navigation: {
                        nextEl: ".swiper-button-next",
                        prevEl: ".swiper-button-prev",
                    },
                    breakpoints: {
                        // Tablet
                        640: {
                            slidesPerView: 2,
                            centeredSlides: false,
                            spaceBetween: 30,
                        },
                        // Desktop
                        1024: {
                            slidesPerView: 3,
                            centeredSlides: false,
                            spaceBetween: 40,
                        },
                    },
                });
            });
        </script>

    </body>

</html>
