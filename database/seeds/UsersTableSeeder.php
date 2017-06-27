<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        static $password;
        for ($i = 0; $i < 50; $i++) {
            $user = User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => $password ?: $password = bcrypt('secret'),
                'remember_token' => str_random(10)
            ]);
            $role = Role::where('name', 'user')->get();
            $user->roles()->attach($role);
        }
//        factory(App\User::class, 50)->create()->each(function ($u) {
//            $u->roles()->attach(factory(App\Role::class)->make());
//        });
    }
}
