<?php

use Faker\Generator as Faker;

$factory->define(App\Notification::class, function (Faker $faker) {
    return [
        'type' => $faker->sentence(2),
        'description' => $faker->paragraph(),
        'recurrence' => 'daily'
    ];
});
