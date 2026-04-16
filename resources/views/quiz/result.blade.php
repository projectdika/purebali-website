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

            <div class="bg-white rounded-xl p-8 mb-6 shadow-sm text-center">
                <div class="flex justify-center mb-4">
                    <div class="w-14 h-14 rounded-full bg-success-bg flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>

                <h2 class="text-2xl font-semibold text-button mb-2">Kuis Selesai!</h2>
                <p class="text-sm text-primary/60 mb-2">Nilai</p>
                <p class="text-5xl font-bold text-button mb-3">{{ $attempt->score }}%</p>
                <p class="text-sm text-primary/60">{{ $correctCount }} dari {{ $totalQuestions }} jawaban benar</p>
            </div>

            <h3 class="text-base font-semibold text-primary mb-3">Review Jawaban</h3>

            @foreach($quiz->questions as $question)
                @php
                    $userAnswer = $attempt->answers->firstWhere('question_id', $question->id);
                    $selectedOption = $userAnswer ? $userAnswer->option : null;
                    $selectedIndex = $selectedOption ? $question->options->search(fn($opt) => $opt->id === $selectedOption->id) : null;
                    $isCorrect = ($selectedIndex === (int)$question->correct_answer);
                @endphp

                <div class="rounded-xl p-5 mb-3 shadow-sm border {{ $isCorrect ? 'bg-success-bg border-success-border' : 'bg-danger-bg border-danger-border' }}">
                    <div class="flex items-start gap-2 mb-4">
                        <div class="w-5 h-5 rounded-full flex items-center justify-center shrink-0 mt-0.5
                                    {{ $isCorrect ? 'bg-success-bg border border-success-border' : 'bg-danger-bg border border-danger-border' }}">
                            @if($isCorrect)
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-success" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 text-danger" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            @endif
                        </div>
                        <p class="text-sm text-primary font-medium leading-relaxed">
                            {{ $loop->iteration }}. {{ $question->question_text }}
                        </p>
                    </div>

                    <div class="space-y-2">
                        @foreach($question->options as $optIndex => $option)
                            @php
                                $isCorrectOption = ($optIndex == $question->correct_answer);
                                $isUserSelected = ($selectedIndex === $optIndex);
                            @endphp
                            <div class="flex items-center justify-between px-3 py-2 rounded-lg
                                        {{ $isCorrectOption ? 'bg-success-bg border border-success-border' : '' }}
                                        {{ $isUserSelected && !$isCorrectOption ? 'bg-danger-bg border border-danger-border' : '' }}
                                        {{ !$isUserSelected && !$isCorrectOption ? 'bg-white border border-card/40' : '' }}">
                                <span class="text-sm {{ $isCorrectOption ? 'text-primary' : 'text-primary/60' }}">
                                    {{ chr(65 + $optIndex) }}. {{ $option->option_text }}
                                </span>
                                @if($isCorrectOption)
                                    <span class="text-xs text-success font-medium">Jawaban Benar</span>
                                @elseif($isUserSelected && !$isCorrectOption)
                                    <span class="text-xs text-danger font-medium">Jawaban Anda</span>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="flex items-center justify-between mb-8">
                <a href="{{ route('quiz.start', $quiz) }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 border border-button text-button text-sm font-medium rounded-lg hover:bg-button hover:text-white transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Ulangi Kuis
                </a>

                <a href="{{ route('home') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 bg-button text-white border border-button text-sm font-medium rounded-lg hover:bg-secondary hover:text-button active:scale-95 transition-all duration-200 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</x-app-layout>