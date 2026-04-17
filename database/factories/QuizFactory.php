<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\Material;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition()
    {
        return [
            'title'       => $this->faker->sentence(3),
            'material_id' => Material::factory(),
        ];
    }
}
