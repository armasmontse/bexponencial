<?php

use Faker\Generator as Faker;

$factory->define(App\School::class, function (Faker $faker) {
    return [
    	'name' => $faker->country,
        'code' => $faker->randomNumber(2)
    ];
});
