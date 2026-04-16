<x-app-layout>
    <div class="font-poppins pt-4 px-4 sm:px-8 lg:px-16 xl:px-32 2xl:px-40">
        <a href="{{ route('dashboard.materials.index') }}" class="flex items-center gap-1.5 text-sm text-gray-600 hover:text-gray-900">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                <path d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z"/>
            </svg>
            Kembali
        </a>
        <p class="text-sm mt-1.5 mb-5 text-gray-500">Edit Materi Budaya</p>
    </div>

    {{-- Error handling --}}
    @if ($errors->any())
        <div class="mx-4 sm:mx-8 lg:mx-16 xl:mx-32 2xl:mx-40 mb-4">
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-r-lg">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <form
        action="{{ route('dashboard.materials.update', $material) }}"
        method="POST"
        enctype="multipart/form-data"
        class="font-poppins px-4 sm:px-8 lg:px-16 xl:px-32 2xl:px-40 pb-32"
        x-data="{
            questions: {{ Js::from($questionsData) }},
            nextId: {{ count($questionsData) + 1 }},
            addQuestion() { /* sama seperti create */ },
            removeQuestion(id) { /* sama seperti create */ }
        }"
    >
        @csrf
        @method('PUT')

        {{-- Informasi Budaya (field seperti create dengan value old atau model) --}}
        <fieldset class="bg-white rounded-2xl shadow-sm border p-5 sm:p-6 mb-5">
            <h2 class="text-xl font-bold mb-5">Informasi Budaya</h2>
            {{-- title --}}
            <input name="title" value="{{ old('title', $material->title) }}" ... />
            {{-- picture (opsional) --}}
            <input type="file" name="picture" ... />
            @if($material->picture)
                <img src="{{ Storage::url($material->picture) }}" class="h-20 mt-2 rounded">
            @endif
            {{-- description --}}
            <textarea name="description">{{ old('description', $material->description) }}</textarea>
            {{-- category_id --}}
            <select name="category_id">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $material->category_id) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            {{-- status --}}
            <select name="status">
                <option value="0" {{ old('status', $material->status) == 0 ? 'selected' : '' }}>Nonaktif</option>
                <option value="1" {{ old('status', $material->status) == 1 ? 'selected' : '' }}>Aktif</option>
            </select>
        </fieldset>

        {{-- Questions (template seperti create) --}}
        <fieldset class="space-y-4">
            <template x-for="(question, index) in questions" :key="question.id">
                <!-- ... sama persis dengan template di create ... -->
            </template>
            <button type="button" @click="addQuestion()">Tambah Pertanyaan</button>
        </fieldset>

        <div class="fixed bottom-0 left-0 right-0 z-20 bg-white/90 backdrop-blur-md border-t py-4 flex justify-end gap-3 px-4 sm:px-8 lg:px-16 xl:px-32 2xl:px-40">
            <a href="{{ route('dashboard.materials.index') }}" class="px-4 py-2 border rounded-xl">Batal</a>
            <button type="submit" class="px-6 py-2 bg-amber-600 text-white rounded-xl">Update</button>
        </div>
    </form>
</x-app-layout>