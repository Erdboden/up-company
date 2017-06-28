<?php

use App\Company;
use App\Domain;
use App\Portfolio;
use App\User;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
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
            $companyName = $faker->unique()->word;
            $company = Company::create([
                'name' => $companyName,
                'slug' => str_replace(' ', '-', $companyName),
                'slogan' => $faker->text($maxNbChars = 200),
                'country' => $faker->country,
                'city' => $faker->city,
                'street' => $faker->streetAddress,
                'main_image_path' => $faker->imageUrl($width = 100, $height = 100),
                'user_id' => User::find(rand(1, 50))->id
            ]);
            $domain = Domain::find(rand(1, 50));
            $company->domain()->attach($domain);
        }
    }
}
