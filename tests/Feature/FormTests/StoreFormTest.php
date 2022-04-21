<?php

namespace Tests\Feature;

use App\Models\Answer;
use Database\Factories\QuestionFactory;
use Tests\TestCase;

class StoreFormTest extends TestCase
{
    /** @test */
    public function it_stores_the_answers_from_the_form()
    {
        $emailQuestion = QuestionFactory::new()->create([
            "question" => "Wat is je e-mail?",
            "slug" => 'email',
        ]);
        $questions = QuestionFactory::times(3)->create();

        $data = [];
        $data = $data + [$emailQuestion->slug => 'Answer on ' . $emailQuestion->question];
        foreach ($questions as $question) {
            $data = $data + [$question->slug => 'Answer on ' . $question->question];
        }

        $response = $this->post(route('form.store'), $data);

        $response->assertSessionHasNoErrors();
        $this->assertNotEmpty(Answer::all());
    }

    /** @test */
    public function it_gives_an_error_if_you_dont_send_all_the_data()
    {
        QuestionFactory::new()->create([
            "question" => "Wat is je e-mail?",
            "slug" => 'email',
            "rules" => 'required|email'
        ]);
        $questions = QuestionFactory::times(3)->create();

        $data = [];
        foreach ($questions as $question) {
            $data = $data + [$question->slug => 'Answer on ' . $question->question];
        }

        $response = $this->post(route('form.store'), $data);

        $response->assertSessionHasErrors();
        $this->assertEmpty(Answer::all());
    }
}
