<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition()
    {
        return [
            'quiz_id'        => Quiz::factory(),
            'question_text'  => $this->faker->sentence(8) . '?',
            'correct_answer' => $this->faker->numberBetween(0, 3),
        ];
    }
}
