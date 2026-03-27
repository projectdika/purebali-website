<x-app-layout>
    <div class="font-poppins pt-4 mx-35">
        <a class="flex items-center gap-1 tex-md transition-all" href="/admin-panel">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z"/></svg>
            <p>Kembali</p>
        </a>
    </div>
    <p class="text-sm mx-35 mt-2 mb-5 text-gray-500 font-poppins">Masukan Detail Informasi Mengenai Budaya</p>
    <form action="GET" class="font-poppins">
        <fieldset class="bg-white rounded-xl shadow-xl mx-35 p-4">
            <h2 class="text-xl font-bold mb-5">Informasi Budaya</h2>
            <div class="flex justify-between gap-4 mb-5">
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
           <div class="flex flex-col gap-1.5">
                <label for="description" class="font-bold text-sm text-gray-800">
                    Isi Artikel
                </label>
                <p class="text-xs text-gray-400">Ceritakan Kebudayaan</p>
                <textarea
                    id="description"
                    name="description"
                    rows="10"
                    maxlength="5000"
                    placeholder="Tulis isi materi disini..."
                    class="w-full bg-input border border-input rounded-xl px-4 py-3.5 text-sm text-gray-800 placeholder-gray-400 resize-y focus:outline-none focus:border-button transition-colors duration-150"
                ></textarea>
            </div>
            <div class="mt-5 flex justify-between">
                <div class="flex flex-col">
                    <label for="category" class="font-bold text-sm mb-3">Kategori Budaya</label>
                    <select class="bg-input p-2 outline-button rounded-xl" id="category" name="category">
                        <option value="Tari Bali">Tari Bali</option>
                        <option value="Benda Kesenian">Benda kesenian</option>
                        <option value="Aksara Bali">Aksara Bali</option>
                        <option value="Adat Istiadat">Adat Istiadat</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label for="status" class="font-bold text-sm mb-3">Status</label>
                    <select class="bg-input p-2 outline-button rounded-xl" id="status" name="status">
                        <option value="0">Nonaktif</option>
                        <option value="1">Aktif</option>
                    </select>
                </div>
            </div>
        </fieldset>
        <fieldset>
            
        </fieldset>
        
    </form>
</x-app-layout>