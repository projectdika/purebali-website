<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Attempt;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function start(Quiz $quiz)
    {

        if ($quiz->questions->count() === 0) {
            return redirect()->back()->with('error', 'Kuis ini belum memiliki pertanyaan.');
        }

        $quiz->load('questions.options');

        return view('quiz.question', compact('quiz'));
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'answers' => 'required|array',
            'answers.*' => 'required|integer|min:0|max:3',
        ]);

        DB::beginTransaction();
        try {

            $totalQuestions = $quiz->questions->count();
            $correctCount = 0;


            $attempt = Attempt::create([
                'quiz_id' => $quiz->id,
                'user_id' => Auth::id(),
                'score' => 0,
            ]);


            foreach ($quiz->questions as $question) {
                $selectedOptionIndex = $request->input("answers.{$question->id}");
                $isCorrect = ($selectedOptionIndex == $question->correct_answer);

                if ($isCorrect) {
                    $correctCount++;
                }


                $option = $question->options->get($selectedOptionIndex);

                if ($option) {
                    Answer::create([
                        'attempt_id'  => $attempt->id,
                        'question_id' => $question->id,
                        'option_id'   => $option->id,
                    ]);
                }
            }


            $score = round(($correctCount / $totalQuestions) * 100);
            $attempt->update(['score' => $score]);

            DB::commit();

            return redirect()->route('quiz.result', $attempt);

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menyimpan jawaban: ' . $e->getMessage());
        }
    }

    public function result(Attempt $attempt)
    {

        if ($attempt->user_id !== Auth::id()) {
            abort(403);
        }

        $attempt->load([
            'quiz.questions.options',
            'answers.option',
            'answers.question'
        ]);


        $quiz = $attempt->quiz;
        $totalQuestions = $quiz->questions->count();
        $correctCount = $attempt->answers->filter(function ($answer) {
            $question = $answer->question;
            $selectedOptionIndex = $question->options->search(function ($option) use ($answer) {
                return $option->id === $answer->option_id;
            });
            return $selectedOptionIndex == $question->correct_answer;
        })->count();

        return view('quiz.result', compact('attempt', 'quiz', 'totalQuestions', 'correctCount'));
    }
}
