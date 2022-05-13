<?php

namespace Tests\Feature;

use Database\Factories\QuestionFactory;
use Tests\TestCase;

class ShowQuestionsTest extends TestCase
{
    /** @test */
    public function it_shows_the_questions_on_the_screen_from_the_database()
    {
        $questions = QuestionFactory::times(3)->create();

        $response = $this->get(route('form.create'));

        $response->assertStatus(200);
        foreach ($questions as $question) {
            $response->assertSee($question->question);
            $response->assertSee($question->answer_type);
            $response->assertSee($question->slug);
        }
    }

    /** @test */
    public function it_doesnt_show_the_question_if_it_is_not_visible()
    {
        $question = QuestionFactory::new()->create(["visible" => false]);

        $response = $this->get(route('form.create'));

        $response->assertStatus(200);
        $response->assertDontSee($question->question);
        $response->assertDontSee($question->slug);

    }
}
