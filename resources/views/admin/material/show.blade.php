<x-app-layout>
    <div class="font-poppins pt-4 px-4 sm:px-8 lg:px-16 xl:px-32 2xl:px-40">
        <a href="{{ route('dashboard.materials.index') }}" class="flex items-center gap-1.5 text-sm text-gray-600 hover:text-gray-900">
            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                <path d="M73.4 297.4C60.9 309.9 60.9 330.2 73.4 342.7L233.4 502.7C245.9 515.2 266.2 515.2 278.7 502.7C291.2 490.2 291.2 469.9 278.7 457.4L173.3 352L544 352C561.7 352 576 337.7 576 320C576 302.3 561.7 288 544 288L173.3 288L278.7 182.6C291.2 170.1 291.2 149.8 278.7 137.3C266.2 124.8 245.9 124.8 233.4 137.3L73.4 297.3z"/>
            </svg>
            Kembali
        </a>
        <h1 class="text-2xl font-bold mt-4">{{ $material->title }}</h1>
        <p class="text-sm text-gray-500 mb-6">Kategori: {{ $material->category->name }} | Status: {{ $material->status ? 'Aktif' : 'Nonaktif' }}</p>
    </div>

    <div class="px-4 sm:px-8 lg:px-16 xl:px-32 2xl:px-40 pb-10">
        @if($material->picture)
            <img src="{{ Storage::url($material->picture) }}" alt="{{ $material->title }}" class="w-full max-h-96 object-cover rounded-xl mb-6">
        @endif

        <div class="prose max-w-none mb-10">
            {!! nl2br(e($material->description)) !!}
        </div>

        @if($material->quiz && $material->quiz->questions->count())
            <h2 class="text-xl font-bold mb-4">Quiz: {{ $material->quiz->title }}</h2>
            @foreach($material->quiz->questions as $index => $question)
                <div class="bg-white p-5 rounded-xl shadow-sm border mb-4">
                    <p class="font-semibold">{{ $index+1 }}. {{ $question->question_text }}</p>
                    <ul class="mt-2 space-y-1">
                        @foreach($question->options as $optIndex => $option)
                            <li class="{{ $optIndex == $question->correct_answer ? 'text-green-700 font-medium' : '' }}">
                                {{ chr(65 + $optIndex) }}. {{ $option->option_text }}
                                @if($optIndex == $question->correct_answer)
                                    ✓ (Jawaban Benar)
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        @else
            <p class="text-gray-500">Belum ada quiz untuk materi ini.</p>
        @endif
    </div>
</x-app-layout>