<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kontrata;
use Faker\Generator as Faker;

$factory->define(Kontrata::class, function (Faker $faker) {
    return [
        'ending_date'=> now(),
        'starting_date'=> now(),
        'total'=>  $faker->numberBetween($min = 2000, $max = 2020),
        'is_closed'=> 0,
        'user_id'=> factory(App\User::class),
        'makina_id'=> factory(App\Makina::class),
    ];
});
