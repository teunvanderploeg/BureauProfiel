<?php

namespace Tests\Feature;

use Database\Factories\QuestionFactory;
use Tests\TestCase;

class IndexQuestionsTest extends TestCase
{
    /** @test */
    public function it_shows_the_questions_on_the_screen_from_the_database()
    {
        $questions = QuestionFactory::times(3)->create();

        $response = $this->get(route('form.index'));

        $response->assertStatus(200);
        foreach ($questions as $question) {
            $response->assertSee($question->question);
            $response->assertSee($question->answer_type);
            $response->assertSee($question->slug);
        }
    }
}
