<?php

use Faker\Generator as Faker;

$factory->define(App\User_Info::class, function (Faker $faker) {
    return [
	    'full_Name' => $faker->name,
	    'state' => 'Activo',
	    'birth_date' => $faker->dateTime()
    ];
});
