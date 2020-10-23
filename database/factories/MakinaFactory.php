<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Makina;
use Faker\Generator as Faker;

$factory->define(Makina::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'karburanti' => $faker->word,
        'qyteti' => $faker->word,
        'kambio' => $faker->word,
        'tipi' => $faker->word,
        'cmimi' => $faker->numberBetween($min = 1000, $max = 9000),
        'viti' => $faker->numberBetween($min = 2000, $max = 2020),

    ];
});
