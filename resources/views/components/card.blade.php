@props([
    'title' => 'Judul Budaya',
    'category' => 'Kategori',
    'link' => '#',         // Kalau lupa diisi, otomatis jadi '#'
    'image' => 'default.jpg' // Kalau lupa diisi, otomatis jadi 'default.jpg'
])

<a class="shadow-lg hover:shadow-2xl rounded-2xl" href="{{ $link }}">
    <article class="relative group text-sm text-primary font-poppins overflow-hidden w-80 shadow-lg h-120 rounded-2xl bg-card">
        <figure class="w-full relative overflow-hidden h-85">
            <img class="transition-transform duration-500 ease-in-out group-hover:scale-105 object-cover w-full h-full inset-0" src="{{ asset($image) }}" alt="Culture Image">
            <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </figure>
        <div class="px-6 pt-4">
            <h2 class="text-lg font-semibold">{{$title}}</h2>
            <div class="flex items-center gap-1">
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
                <p>{{$category}}</p>
            </div>
        </div>
        <footer class="mx-6 mt-4 border-t-primary pt-3 border-t flex items-center justify-center gap-1">
            <p>Detail Budaya</p>
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </footer>
    </article>
</a>
