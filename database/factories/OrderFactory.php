<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween(9,999),
        'order_details' => [

                'customer_name' => $faker->name,
                'customer_phone' =>$faker->phoneNumber,
                'customer_address' =>$faker->address,

        ],
    ];
});
