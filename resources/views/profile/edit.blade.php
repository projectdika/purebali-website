<x-app-layout>
    <div class="min-h-screen bg-secondary py-8 px-4 font-poppins">
        <div class="max-w-3xl mx-auto">

            <div class="mb-6">
                <a href="{{ route('home') }}"
                   class="inline-flex items-center gap-2 px-4 py-2 border border-button text-button rounded-lg text-sm font-medium hover:bg-button hover:text-white transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>

            <div class="mb-6">
                <h1 class="text-2xl font-bold text-primary">Edit Profil</h1>
                <p class="text-sm text-gray-500 mt-1">Perbarui informasi pribadi Anda</p>
            </div>

            @if (session('success'))
                <div class="mb-4 bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-r-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-lg">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" class="bg-white rounded-2xl shadow-sm border border-stone-100 p-6 sm:p-8">
                @csrf
                @method('PUT')

                <div class="mb-5">
                    <label for="name" class="block font-medium text-sm text-gray-700 mb-1">Nama Lengkap</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name', $user->name) }}"
                        class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                        required
                    >
                </div>

                <div class="mb-5">
                    <label for="email" class="block font-medium text-sm text-gray-700 mb-1">Alamat Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email', $user->email) }}"
                        class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                        required
                    >
                </div>

                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-stone-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-3 bg-white text-gray-500">Ubah Password (opsional)</span>
                    </div>
                </div>

                <div class="mb-5">
                    <label for="current_password" class="block font-medium text-sm text-gray-700 mb-1">Password Saat Ini</label>
                    <input
                        type="password"
                        name="current_password"
                        id="current_password"
                        class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                        placeholder="••••••••"
                    >
                </div>

                <div class="mb-5">
                    <label for="password" class="block font-medium text-sm text-gray-700 mb-1">Password Baru</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                        placeholder="Minimal 8 karakter"
                    >
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block font-medium text-sm text-gray-700 mb-1">Konfirmasi Password Baru</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                        placeholder="Ketik ulang password baru"
                    >
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-stone-100">
                    <a href="{{ route('home') }}" class="px-5 py-2.5 border border-stone-200 rounded-xl text-sm text-gray-600 hover:bg-gray-50 transition">Batal</a>
                    <button type="submit" class="px-6 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-xl shadow-sm transition duration-200 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
