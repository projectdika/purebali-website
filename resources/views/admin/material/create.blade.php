<x-app-layout>

    <div class="font-poppins pt-4 px-4 sm:px-8 lg:px-16 xl:px-32 2xl:px-40">
        <a class="flex items-center gap-1.5 text-sm text-gray-600 hover:text-gray-900 transition-colors w-fit" href="/admin-panel">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                <path d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z"/>
            </svg>
            <p>Kembali</p>
        </a>
        <p class="text-sm mt-1.5 mb-5 text-gray-500">Masukan Detail Informasi Mengenai Budaya</p>
    </div>

    <form
        action="#"
        method="POST"
        enctype="multipart/form-data"
        class="font-poppins px-4 sm:px-8 lg:px-16 xl:px-32 2xl:px-40 pb-32"
        x-data="{
            questions: [
                { id: 1, pertanyaan: '', pilihan: ['', '', '', ''], jawaban_benar: null }
            ],
            nextId: 2,
            addQuestion() {
                this.questions.push({
                    id: this.nextId++,
                    pertanyaan: '',
                    pilihan: ['', '', '', ''],
                    jawaban_benar: null
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

        {{-- INFO BUDAYA --}}
        
        <fieldset class="bg-white rounded-2xl shadow-sm border border-stone-100 p-5 sm:p-6 mb-5">
            <h2 class="text-xl font-bold mb-5 text-gray-800">Informasi Budaya</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-5">
                <x-input
                    name="title"
                    type="text"
                    label="Nama Budaya"
                    placeholder="Contoh: Tari Baris Gede"
                />
                <x-input
                    name="image"
                    label="Foto Utama"
                    type="file"
                />
            </div>

            <div class="flex flex-col gap-1.5 mb-5">
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
                    class="w-full bg-stone-50 border border-stone-200 rounded-xl px-4 py-3.5 text-sm
                           text-gray-800 placeholder-gray-400 resize-y
                           focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent
                           transition-colors duration-150"
                ></textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <label for="category" class="font-bold text-sm text-gray-800">Kategori Budaya</label>
                    <select
                        id="category"
                        name="category"
                        class="bg-stone-50 border border-stone-200 px-3 py-2.5 rounded-xl text-sm text-gray-700
                               focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent
                               transition duration-150"
                    >
                        <option value="Tari Bali">Tari Bali</option>
                        <option value="Benda Kesenian">Benda Kesenian</option>
                        <option value="Aksara Bali">Aksara Bali</option>
                        <option value="Adat Istiadat">Adat Istiadat</option>
                    </select>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="status" class="font-bold text-sm text-gray-800">Status</label>
                    <select
                        id="status"
                        name="status"
                        class="bg-stone-50 border border-stone-200 px-3 py-2.5 rounded-xl text-sm text-gray-700
                               focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent
                               transition duration-150"
                    >
                        <option value="0">Nonaktif</option>
                        <option value="1">Aktif</option>
                    </select>
                </div>
            </div>
        </fieldset>

        {{-- PERTANYAAN KUIS --}}

        <fieldset>
            <div class="space-y-4">

                <template x-for="(question, index) in questions" :key="question.id">
                    <div
                        data-question-card
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-3"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="bg-white rounded-2xl shadow-sm border border-stone-100 overflow-hidden"
                    >

                        <div class="flex items-center justify-between px-4 sm:px-6 py-4 border-b border-stone-100 bg-stone-50/60">
                            <div class="flex items-center gap-3">
                                <span
                                    class="w-7 h-7 rounded-full bg-amber-100 text-amber-800 text-xs font-bold
                                           flex items-center justify-center flex-shrink-0"
                                    x-text="index + 1"
                                ></span>
                                <h3 class="font-semibold text-gray-700 text-sm">Pertanyaan Kuis</h3>
                            </div>

                            <button
                                type="button"
                                @click="removeQuestion(question.id)"
                                :disabled="questions.length === 1"
                                :class="questions.length === 1
                                    ? 'text-gray-300 cursor-not-allowed'
                                    : 'text-gray-400 hover:text-red-500 hover:bg-red-50'"
                                class="p-2 rounded-lg transition-all duration-150"
                                :aria-label="'Hapus pertanyaan ' + (index + 1)"
                            >
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7
                                           m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>

                        <div class="px-4 sm:px-6 py-5 space-y-5">

                            <div>
                                <label
                                    :for="'pertanyaan_' + question.id"
                                    class="block text-sm font-medium text-gray-700 mb-2"
                                >
                                    Pertanyaan <span class="text-red-500">*</span>
                                </label>
                                <textarea
                                    :id="'pertanyaan_' + question.id"
                                    :name="'questions[' + index + '][pertanyaan]'"
                                    x-model="question.pertanyaan"
                                    placeholder="Tulis pertanyaan Anda di sini"
                                    rows="2"
                                    required
                                    class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm
                                           text-gray-700 placeholder-gray-400 resize-none
                                           focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent
                                           transition duration-200"
                                ></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">
                                    Pilihan Jawaban <span class="text-red-500">*</span>
                                </label>

                                <div class="space-y-2.5">
                                    <template x-for="(pilihan, pIndex) in question.pilihan" :key="pIndex">
                                        <div class="flex items-center gap-3">

                                            <input
                                                type="radio"
                                                :name="'questions[' + index + '][jawaban_benar]'"
                                                :value="pIndex"
                                                x-model="question.jawaban_benar"
                                                :id="'radio_' + question.id + '_' + pIndex"
                                                class="w-4 h-4 text-amber-700 border-stone-300
                                                       focus:ring-amber-500 cursor-pointer flex-shrink-0"
                                            />

                                            <div class="relative flex-1">
                                                <input
                                                    type="text"
                                                    :name="'questions[' + index + '][pilihan][' + pIndex + ']'"
                                                    x-model="question.pilihan[pIndex]"
                                                    :placeholder="'Pilihan ' + (pIndex + 1)"
                                                    required
                                                    :class="question.jawaban_benar == pIndex
                                                        ? 'border-amber-400 bg-amber-50 ring-2 ring-amber-100'
                                                        : 'border-stone-200 bg-stone-50'"
                                                    class="w-full px-4 py-2.5 rounded-xl text-sm text-gray-700
                                                           placeholder-gray-400 border pr-9
                                                           focus:outline-none focus:ring-2 focus:ring-amber-400 focus:border-transparent
                                                           transition-all duration-200"
                                                />
                                                <span
                                                    x-show="question.jawaban_benar == pIndex"
                                                    x-transition
                                                    class="absolute inset-y-0 right-3 flex items-center pointer-events-none"
                                                >
                                                    <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </span>
                                            </div>

                                        </div>
                                    </template>
                                </div>

                                <p
                                    class="mt-3 text-xs transition-colors duration-200"
                                    :class="question.jawaban_benar !== null ? 'text-amber-700 font-medium' : 'text-gray-400'"
                                >
                                    <template x-if="question.jawaban_benar === null">
                                        <span>Pilih Radio Button Untuk Menandai Jawaban yang Benar</span>
                                    </template>
                                    <template x-if="question.jawaban_benar !== null">
                                        <span>✓ Jawaban benar: Pilihan <span x-text="Number(question.jawaban_benar) + 1"></span></span>
                                    </template>
                                </p>
                            </div>

                        </div>
                    </div>
                </template>

                <div class="flex justify-center py-2">
                    <button
                        type="button"
                        @click="addQuestion()"
                        class="inline-flex items-center gap-2 px-6 py-2.5
                               border border-amber-300 text-amber-800 bg-white
                               hover:bg-amber-50 hover:border-amber-400
                               text-sm font-medium rounded-xl transition-all duration-200
                               focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Tambah Pertanyaan
                    </button>
                </div>

            </div>
        </fieldset>

        <div class="fixed bottom-0 left-0 right-0 z-20 bg-white/90 backdrop-blur-md border-t border-stone-200
                    px-4 sm:px-8 lg:px-16 xl:px-32 2xl:px-40 py-4
                    flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-gray-400 w-full sm:w-auto text-center sm:text-left">
                <span x-text="questions.length"></span> pertanyaan ditambahkan
            </p>
            <div class="flex items-center gap-3 w-full sm:w-auto">
                <a
                    href="/admin-panel"
                    class="flex-1 sm:flex-none text-center px-4 py-2 border border-stone-200 rounded-xl text-md text-gray-600  hover:text-white hover:bg-red-600 transition"
                >
                    Batal
                </a>
                <x-button type="submit" tag="button" size="md">Simpan</x-button>
            </div>
        </div>

    </form>

</x-app-layout>
