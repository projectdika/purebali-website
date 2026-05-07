<x-app-layout>
    <div class="px-5 pt-2 md:px-35 flex justify-between items-center">
        <div>
            <h1 class="text-black text-xl md:text-3xl mb-2 font-bold">Daftar User</h1>
            <p class="text-xs md:text-md text-gray-600">Kelola Daftar User</p>
        </div>
    </div>

    <form action="{{ route('dashboard.users.index') }}" method="GET" class="mx-5 md:mx-35 py-2 justify-center bg-white px-4 shadow-md rounded-xl items-center mt-5 flex gap-4">
        @csrf
        <x-input
        name="search"
        id="search"
        value="{{ request('search') }}"
        placeholder="Cari User..."/>
        <x-button
        size="md"
        tag="button"
        type="submit"
        class="cursor-pointer fill-white hover:fill-button gap-1"
        >
        <p>Cari</p>
        <svg class="size-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M480 272C480 317.9 465.1 360.3 440 394.7L566.6 521.4C579.1 533.9 579.1 554.2 566.6 566.7C554.1 579.2 533.8 579.2 521.3 566.7L394.7 440C360.3 465.1 317.9 480 272 480C157.1 480 64 386.9 64 272C64 157.1 157.1 64 272 64C386.9 64 480 157.1 480 272zM272 416C351.5 416 416 351.5 416 272C416 192.5 351.5 128 272 128C192.5 128 128 192.5 128 272C128 351.5 192.5 416 272 416z"/></svg>
        </x-button>
    </form>

    <div class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden mx-5 md:mx-35 mt-5">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b font-poppins border-stone-100">
                    <th class="px-6 py-4 text-left text-sm font-semibold text-black tracking-wider w-[40%]">
                        Nama User
                    </th>
                    <th class="hidden md:table-cell px-6 py-4 text-center text-sm font-semibold text-black tracking-wider">
                        Email
                    </th>
                    <th class="hidden md:table-cell px-6 py-4 text-center text-sm font-semibold text-black tracking-wider">
                        Role
                    </th>
                    <th class="hidden md:table-cell px-6 py-4 text-left text-sm font-semibold text-black tracking-wider">
                        Nomer HP
                    </th>
                    <th class="hidden lg:table-cell px-6 py-4 text-left text-sm font-semibold text-black tracking-wider">
                        Percobaan Quiz
                    </th>
                    <th class="px-6 py-4 text-left text-sm font-semibold text-black tracking-wider">
                        Aktivitas
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-stone-100">
                @foreach ($users as $data)
                    <tr class="hover:bg-stone-50/70 transition-colors duration-150 group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <p class="font-medium text-gray-800 group-hover:text-amber-800 transition-colors duration-150">
                                    {{ $data['name'] }}
                                </p>
                            </div>
                        </td>

                        <td class="hidden md:table-cell px-6 text-center py-4">
                            <span class="font-medium text-gray-700">
                                {{ $data['email'] }}
                            </span>
                        </td>
                        <td class="hidden md:table-cell px-6 text-center py-4">
                            <span class="font-medium text-gray-700">
                                {{ $data['role'] }}
                            </span>
                        </td>

                        <td class="hidden md:table-cell px-6 py-4 text-gray-600">
                            {{ $data['phone_number'] }}
                        </td>

                        <td class="hidden lg:table-cell text-gray-600 px-6 py-4">
                            {{ $data->attempts->count() }}
                        </td>

                        <td class=" px-6 py-4">
                            <div class="flex items-center gap-1">
                                <a
                                    href="{{route('dashboard.users.edit', $data->id)}}"
                                    aria-label="Edit {{ $data['title'] }}"
                                    class="p-2 rounded-lg text-gray-400 hover:text-blue-600 hover:bg-blue-50
                                           transition-all duration-150"
                                >
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5
                                               m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('dashboard.users.destroy', $data) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                    type="submit"
                                    aria-label="Hapus {{ $data['name'] }}"
                                    class="p-2 rounded-lg text-gray-400 hover:text-red-600 hover:bg-red-50
                                    transition-all duration-150"
                                    >
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7
                                    m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         <div class="px-5 mb-3 mt-6">
        {{ $users->links() }}
    </div>
    </div>
</x-app-layout>
