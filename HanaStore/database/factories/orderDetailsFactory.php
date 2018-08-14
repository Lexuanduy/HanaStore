<?php

use Faker\Generator as Faker;

$factory->define(App\OrderDetails::class, function (Faker $faker) {
    return [
        'orderId' => 1,
        'productId' => 1,
        'quantity' => 1,
        'unitPrice' => 14.9,
        'address' => $faker->address,
    ];
});
