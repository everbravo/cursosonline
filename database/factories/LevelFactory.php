<?php

use Faker\Generator as Faker;

$factory->define(App\Level::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence
    ];
});
