<?php

namespace Database\Seeders;

use Database\Factories\RespondentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RespondentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RespondentFactory::new()->create();
    }
}
