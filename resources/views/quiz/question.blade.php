<x-app-layout>
    <div class="min-h-screen bg-secondary py-8 px-4 font-poppins">
        <div class="max-w-2xl mx-auto">
            <div class="mb-6">
                <a href="{{ route('culture.show', $quiz->material->id) }}"
                   class="inline-flex items-center gap-2 px-4 py-2 border border-button text-button rounded-lg text-sm font-medium hover:bg-button hover:text-white transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Kembali ke Materi
                </a>
            </div>

            <form action="{{ route('quiz.submit', $quiz) }}" method="POST">
                @csrf

                @foreach($quiz->questions as $index => $question)
                    <div class="bg-white rounded-xl p-6 mb-4 shadow-sm">
                        <p class="text-primary text-sm font-medium leading-relaxed mb-5">
                            {{ $index + 1 }}. {{ $question->question_text }}
                        </p>
                        <div class="space-y-3">
                            @foreach($question->options as $optIndex => $option)
                                <label class="flex items-center gap-3 cursor-pointer group">
                                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $optIndex }}"
                                           {{-- @checked($loop->first) --}}
                                           class="w-4 h-4 accent-button cursor-pointer">
                                    <span class="text-sm text-primary group-hover:text-button transition-colors duration-150">
                                        {{ chr(65 + $optIndex) }}. {{ $option->option_text }}
                                    </span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="flex justify-end mt-4 mb-8">
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-button text-white border border-button text-sm font-medium rounded-lg hover:bg-secondary hover:text-button active:scale-95 transition-all duration-200 shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Kirim jawaban
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
