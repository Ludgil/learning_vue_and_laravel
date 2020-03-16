<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'location' => $faker->address,
    ];
});
