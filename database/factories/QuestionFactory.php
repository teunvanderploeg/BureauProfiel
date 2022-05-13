<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "question" => str_replace('.', '', $this->faker->text(20)) . "?",
            "slug" => $this->faker->slug(),
            "answer_type" => 'text',
            "sample_answers" => null,
            "visible" => true,
        ];
    }
}
