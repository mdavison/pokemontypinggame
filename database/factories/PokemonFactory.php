<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Pokemon::class, function (Faker $faker) {
    $index = $faker->unique()->numberBetween(1, 100);

    return [
        'index' => $index,
        'name' => $faker->word,
        'image' => str_pad($index,  3, '0', STR_PAD_LEFT) . '.png',
    ];
});
