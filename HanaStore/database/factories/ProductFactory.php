<?php

use Faker\Generator as Faker;

$factory->define(App\ProductModel::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'categoryId' => 1,
        'collectionId' => 1,
        'price' => 14.5,
        'images' => 'https://1.bp.blogspot.com/-keXhlFhER9E/TZ7z2RNmpQI/AAAAAAAAAR0/cxD-Gs5WT94/s1600/dark-blue-flowers.jpg',
        'sale' => 10,
        'description' => 'Dark Blue Flowers',
        'detail' => 'Flowers Arround Us And Give Life Everyday',
    ];
});
