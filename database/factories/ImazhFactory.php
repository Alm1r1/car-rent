<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Imazh;
use Faker\Generator as Faker;

$factory->define(Imazh::class, function (Faker $faker) {
    return [
        'img_path'=>$faker->word,
        'makina_id'=>factory(App\Makina::class),
    ];
});
