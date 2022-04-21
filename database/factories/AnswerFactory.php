<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'respondent_id' => RespondentFactory::new()->create(),
            'question_id' => QuestionFactory::new()->create(),
            'answer' => $this->faker->text(50),
        ];
    }
}
