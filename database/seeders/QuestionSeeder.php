<?php

namespace Database\Seeders;

use Database\Factories\QuestionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionFactory::new()->create([
            "question" => "Wat is je e-mail?",
            "slug" => 'email',
            "answer_type" => 'email',
        ]);
        QuestionFactory::times(5)->create();
    }
}
