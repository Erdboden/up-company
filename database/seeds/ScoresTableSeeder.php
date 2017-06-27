<?php

use Illuminate\Database\Seeder;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {

            \App\Score::create([
                'score_number' => $i,
                'score_text' => 'score'
            ]);
        }
    }
}
