<x-app-layout>
    @if ($errors->any())
        <div class="mx-4 sm:mx-8 lg:mx-16 xl:mx-32 2xl:mx-40 mb-4">
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-lg">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <section class="flex justify-center">
    <form
        action="{{ route('dashboard.users.update', $user) }}"
        method="POST"
        class="font-poppins px-4 sm:px-8 lg:px-16 xl:px-32 2xl:px-40 pb-20"
    >

        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl shadow-sm border border-stone-100 p-6 sm:p-8 max-w-3xl">
            <a href="{{ route('dashboard.users.index') }}" class="flex mb-2 items-center gap-1.5 text-sm text-gray-600 hover:text-gray-900">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                <path d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z"/>
            </svg>
            Kembali ke Daftar User
        </a>
            <h2 class="text-xl font-bold mb-6 text-gray-800">Informasi Pengguna</h2>

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
            <div class="mb-5">
                <label for="phone_number" class="block font-medium text-sm text-gray-700 mb-1">Nomor HP</label>
                <input
                    type="text"
                    name="phone_number"
                    id="phone_number"
                    value="{{ old('phone_number', $user->phone_number) }}"
                    class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                    required
                >
            </div>

            @if(isset($roles))
            <div class="mb-5">
                <label for="role" class="block font-medium text-sm text-gray-700 mb-1">Peran (Role)</label>
                <select
                    name="role"
                    id="role"
                    class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                >
                    @foreach($roles as $roleValue => $roleLabel)
                        <option value="{{ $roleValue }}" {{ old('role', $user->role ?? '') == $roleValue ? 'selected' : '' }}>
                            {{ $roleLabel }}
                        </option>
                    @endforeach
                </select>
            </div>
            @endif

            <div class="mb-5">
                <label for="password" class="block font-medium text-sm text-gray-700 mb-1">Password Baru (Kosongkan jika tidak ingin mengganti)</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                >
            </div>

            <div class="mb-6">
                <label for="password_confirmation" class="block font-medium text-sm text-gray-700 mb-1">Konfirmasi Password Baru</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition"
                >
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-stone-100">
                <a href="{{ route('dashboard.users.index') }}" class="px-5 py-2.5 border border-stone-200 rounded-xl text-sm text-gray-600 hover:bg-gray-50 transition">Batal</a>
                <button type="submit" class="px-6 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-xl shadow-sm transition duration-200 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2">Simpan Perubahan</button>
            </div>
        </div>
    </form>
    </section>
</x-app-layout>
