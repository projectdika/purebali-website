<x-app-layout>
    <div class="font-poppins pt-4 px-4 sm:px-8 lg:px-16 xl:px-32 2xl:px-40">
        <a class="flex items-center gap-1.5 text-sm text-gray-600 hover:text-gray-900 transition-colors w-fit" href="{{ route('dashboard.materials.index') }}">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                <path d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z"/>
            </svg>
            <p>Kembali</p>
        </a>
        <p class="text-sm mt-1.5 mb-5 text-gray-500">Masukan Detail Informasi Mengenai Budaya</p>
    </div>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="mx-4 sm:mx-8 lg:mx-16 xl:mx-32 2xl:mx-40 mb-4">
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-lg">
                <p class="font-bold">Terjadi kesalahan:</p>
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    {{-- Tampilkan error exception --}}
    @if (session('error'))
        <div class="mx-4 sm:mx-8 lg:mx-16 xl:mx-32 2xl:mx-40 mb-4">
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-lg">
                {{ session('error') }}
            </div>
        </div>
    @endif

    <form
        action="{{ route('dashboard.materials.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="font-poppins px-4 sm:px-8 lg:px-16 xl:px-32 2xl:px-40 pb-32"
        x-data="{
            questions: [
                { id: 1, question_text: '', options: ['', '', '', ''], correct_answer: 0 }
            ],
            nextId: 2,
            addQuestion() {
                this.questions.push({
                    id: this.nextId++,
                    question_text: '',
                    options: ['', '', '', ''],
                    correct_answer: 0
                });
                this.$nextTick(() => {
                    const cards = document.querySelectorAll('[data-question-card]');
                    cards[cards.length - 1].scrollIntoView({ behavior: 'smooth', block: 'start' });
                });
            },
            removeQuestion(id) {
                if (this.questions.length === 1) return;
                this.questions = this.questions.filter(q => q.id !== id);
            }
        }"
    >
        @csrf

        {{-- INFORMASI BUDAYA --}}
        <fieldset class="bg-white rounded-2xl shadow-sm border border-stone-100 p-5 sm:p-6 mb-5">
            <h2 class="text-xl font-bold mb-5 text-gray-800">Informasi Budaya</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-5">
                <div class="col-span-full">
                    <label for="title" class="font-bold text-sm text-gray-800">Nama Budaya</label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        placeholder="Contoh: Tari Baris Gede"
                        value="{{ old('title') }}"
                        class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3.5 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-colors duration-150"
                    >
                </div>
                <div class="col-span-full">
                    <label for="picture" class="font-bold text-sm text-gray-800">Foto Utama</label>
                    <input
                        id="picture"
                        name="picture"
                        type="file"
                        accept="image/jpeg,image/png,image/jpg"
                        class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3.5 text-sm text-gray-800 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-colors duration-150"
                    >
                </div>
            </div>

            <div class="flex flex-col gap-1.5 mb-5">
                <label for="description" class="font-bold text-sm text-gray-800">Isi Artikel</label>
                <p class="text-xs text-gray-400">Ceritakan Kebudayaan</p>
                <textarea
                    id="description"
                    name="description"
                    rows="10"
                    maxlength="5000"
                    placeholder="Tulis isi materi disini..."
                    class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3.5 text-sm text-gray-800 placeholder-gray-400 resize-y focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-colors duration-150"
                >{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <label for="category_id" class="font-bold text-sm text-gray-800">Kategori Budaya</label>
                    <select
                        id="category_id"
                        name="category_id"
                        class="bg-stone-50 border border-stone-200 px-3 py-2.5 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-150"
                    >
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="status" class="font-bold text-sm text-gray-800">Status</label>
                    <select
                        id="status"
                        name="status"
                        class="bg-stone-50 border border-stone-200 px-3 py-2.5 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-150"
                    >
                        <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Nonaktif</option>
                        <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>Aktif</option>
                    </select>
                </div>
            </div>
        </fieldset>

        {{-- PERTANYAAN KUIS --}}
        <fieldset class="space-y-4">
            <template x-for="(question, index) in questions" :key="question.id">
                <div
                    data-question-card
                    class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden"
                >
                    <div class="flex items-center justify-between px-4 sm:px-6 py-4 border-b border-stone-100 bg-stone-50/60">
                        <div class="flex items-center gap-3">
                            <span class="w-7 h-7 rounded-full bg-amber-100 text-amber-800 text-xs font-bold flex items-center justify-center flex-shrink-0" x-text="index + 1"></span>
                            <h3 class="font-semibold text-gray-700 text-sm">Pertanyaan Kuis</h3>
                        </div>
                        <button
                            type="button"
                            @click="removeQuestion(question.id)"
                            :disabled="questions.length === 1"
                            :class="questions.length === 1 ? 'text-gray-300 cursor-not-allowed' : 'text-gray-400 hover:text-red-500 hover:bg-red-50'"
                            class="p-2 rounded-lg transition-all duration-150"
                        >
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>

                    <div class="px-4 sm:px-6 py-5 space-y-5">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pertanyaan <span class="text-red-500">*</span></label>
                            <textarea
                                :name="'questions[' + index + '][question_text]'"
                                x-model="question.question_text"
                                placeholder="Tulis pertanyaan Anda di sini"
                                rows="2"
                                required
                                class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm text-gray-700 placeholder-gray-400 resize-none focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition duration-200"
                            ></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-3">Pilihan Jawaban <span class="text-red-500">*</span></label>
                            <div class="space-y-2.5">
                                <template x-for="(opt, optIndex) in question.options" :key="optIndex">
                                    <div class="flex items-center gap-3">
                                        <input
                                            type="radio"
                                            :name="'questions[' + index + '][correct_answer]'"
                                            :value="optIndex"
                                            x-model="question.correct_answer"
                                            class="w-4 h-4 text-amber-700 border-stone-300 focus:ring-amber-500 cursor-pointer flex-shrink-0"
                                        />
                                        <input
                                            type="text"
                                            :name="'questions[' + index + '][options][' + optIndex + ']'"
                                            x-model="question.options[optIndex]"
                                            :placeholder="'Pilihan ' + (optIndex + 1)"
                                            required
                                            :class="question.correct_answer == optIndex ? 'border-amber-400 bg-amber-50 ring-2 ring-amber-100' : 'border-stone-200 bg-stone-50'"
                                            class="w-full px-4 py-2.5 rounded-xl text-sm text-gray-700 placeholder-gray-400 border focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent transition-all duration-200"
                                        />
                                    </div>
                                </template>
                            </div>
                            <p class="mt-3 text-xs text-gray-400">
                                Pilih radio button untuk menandai jawaban benar (default: Pilihan 1)
                            </p>
                        </div>
                    </div>
                </div>
            </template>

            <div class="flex justify-center py-2">
                <button
                    type="button"
                    @click="addQuestion()"
                    class="inline-flex items-center gap-2 px-6 py-2.5 border border-amber-300 text-amber-800 bg-white hover:bg-amber-50 hover:border-amber-400 text-sm font-medium rounded-xl transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2"
                >
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Pertanyaan
                </button>
            </div>
        </fieldset>

        {{-- TOMBOL AKSI --}}
        <div class="fixed bottom-0 left-0 right-0 z-20 bg-white/90 backdrop-blur-md border-t border-stone-200 px-4 sm:px-8 lg:px-16 xl:px-32 2xl:px-40 py-4 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-gray-400 w-full sm:w-auto text-center sm:text-left">
                <span x-text="questions.length"></span> pertanyaan ditambahkan
            </p>
            <div class="flex items-center gap-3 w-full sm:w-auto">
                <a href="{{ route('dashboard.materials.index') }}" class="flex-1 sm:flex-none text-center px-4 py-2 border border-stone-200 rounded-xl text-md text-gray-600 hover:text-white hover:bg-red-600 transition">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-xl transition duration-200 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2">
                    Simpan
                </button>
            </div>
        </div>
    </form>
</x-app-layout>