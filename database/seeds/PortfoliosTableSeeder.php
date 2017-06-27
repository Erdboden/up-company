<?php

use App\Company;
use Illuminate\Database\Seeder;

class PortfoliosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        static $company = null;

        for ($i = 0; $i < 100; $i++) {
            \App\Portfolio::create([
                'title' => $faker->text($maxNbChars = 50),
                'body' => $faker->paragraph,
                'image_path' => $faker->imageUrl($width = 100, $height = 100),
                'company_id' => Company::find(rand(1, 50))->id
            ]);
        }
    }
}
