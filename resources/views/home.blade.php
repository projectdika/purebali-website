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
                    .swiper-button-next::after, .swiper-button-prev::after {
                        font-size: 14px !important;
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
