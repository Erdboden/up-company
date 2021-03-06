<?php

use Illuminate\Database\Seeder;

class DomainsTableSeeder extends Seeder
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
            $domainName = $faker->unique()->word;

            \App\Domain::create([
                'name' => $domainName,
                'slug' => $domainName
            ]);
        }
    }
}
