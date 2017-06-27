<?php

use App\Company;
use App\Review;
use App\Score;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {


            Review::create([
                'body' => $faker->text($maxNbChars = 100),
                'company_id' => Company::find(rand(1, 50))->id,
                'score_id' => Score::find(rand(1, 5))->id
            ]);
        }
    }
}
