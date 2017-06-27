<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DomainsTableSeeder::class);
        $this->call(CompaniesTableSeeder::class);

        $this->call(ScoresTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(PortfoliosTableSeeder::class);
    }
}
