<x-app-layout>
    <div class="font-poppins pt-4 mx-35">
        <a class="flex items-center gap-1 tex-md transition-all" href="/admin-panel">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z"/></svg>
            <p>Kembali</p>
        </a>
    </div>
    <p class="text-sm mx-35 mt-2 text-gray-500 font-poppins">Masukan Detail Informasi Mengenai Budaya</p>
    <form action="GET">
        <fieldset class="">
            <legend>Informasi Budaya</legend>
            <div class="">
                <x-input
                name="title"
                type="name"
                label="Nama Budaya"
                placeholder="Contoh: Tari Baris Gede"
                />
                <x-input
                name="image"
                label="Foto Utama"
                type="file"
                />
            </div>
            <x-input
            name="description"
            label="Deskripsi Budaya"
            placeholder="Ceritakan Budaya"
            />
            <div>
                <label for="category">Pilih Kategori:</label>
                <select id="kategori" name="category">
                    <option value="elektronik">Elektronik</option>
                    <option value="pakaian">Pakaian</option>
                    <option value="makanan">Makanan</option>
                </select>
                <label for=""></label>
                <select name="status">
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
        </fieldset>
    </form>
</x-app-layout>