<?php

use Faker\Generator as Faker;
use Faker\Provider\Address;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
	    'street' => $faker->streetName,
	    'street_no' => $faker->buildingNumber,
	    'neighbourhood' => $faker->secondaryAddress,
	    'city' => $faker->city,
	    'state' => $faker->state,
	    'zip_code' => $faker->postCode
    ];
});
