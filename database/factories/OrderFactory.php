<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'amount' => $faker->numberBetween(9,500),
        'is_complete' => $faker->randomElement([1,0]),
        'completed_at'=>$faker->date('Y-m-d h:m:s'),
        'order_details' => [

                'items' =>[1,2,3],
                'customer_name' => $faker->name,
                'customer_phone' =>$faker->phoneNumber,
                'customer_address' =>$faker->address,

        ],
    ];
});
