<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Role;
use App\Score;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role_id' => function () {
            return Role::find(1);
        }
    ];
});

$factory->define(App\Company::class, function ($faker) {
    $companyName = $faker->word;
    return [
        'name' => $companyName,
        'slug' => str_replace(' ', '-', $companyName),
        'slogan' => $faker->text($maxNbChars = 200),
        'country' => $faker->country,
        'city' => $faker->city,
        'street' => $faker->streetAddress,
        'main_image_path' => $faker->imageUrl($width = 100, $height = 100),
        'user_id' => function () {
            return factory('App\User')->create()->id;
        },
        'domain_id' => function () {
            return factory('App\Domain')->create()->id;
        }

    ];
});
$factory->define(Role::class, function () {
    return [
        'name' => 'user'
    ];
});

$factory->define(Score::class, function () {
    return [
        'score_number' => 5,
        'score_text' => 'Best'
    ];
});

$factory->define(App\Domain::class, function ($faker) {
    $domainName = $faker->word;
    return [
        'name' => $domainName,
        'slug' => $domainName
    ];
});

$factory->define(App\Portfolio::class, function ($faker) {

    return [
        'title' => $faker->text($maxNbChars = 50),
        'body' => $faker->paragraph,
        'image_path' => $faker->imageUrl($width = 100, $height = 100),
        'company_id' => function ($i = 0) {
            return \App\Company::find(++$i);
        }

    ];
});
$factory->define(App\Review::class, function ($faker) {
    return [
        'body' => $faker->paragraph,
        'score_id' => function () {
            return \App\Score::find(1);
        },
        'company_id' => function () {
            return factory('App\Company')->create()->id;
        }
    ];
});