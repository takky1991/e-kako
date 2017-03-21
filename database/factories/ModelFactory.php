<?php

use App\Category;

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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'first_name' => $faker->name,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->state(App\User::class, 'admin', function (Faker\Generator $faker) {
    return [
        'email' => 'admin@admin.com'
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'slug' => $faker->word,
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'category_id' => $faker->randomElement($categories = Category::all()->pluck('id')->toArray()),
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'content' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
    ];
});