<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$prices = [
    1000000,
    1100000,
    1200000,
    1300000,
    1400000,
    1500000,
    1600000,
    1700000,
    1800000,
    1900000,
    2000000,
    2100000,
    2200000,
    2300000,
    2400000,
    2500000,
    2600000,
    2700000,
    2800000,
    2900000,
    3000000
];


$factory->define(Product::class, function (Faker $faker) use ($prices) {
    return [
        'name' => $faker->text($maxNbChars = 30),
        'description' => $faker->text($maxNbChars = 200),
        'price' => $prices[rand(0,20)],
        'quantity' => rand(1,20),
        'image' => 'images/products/' . rand(1,30) . '.jpg',
        'id_category' => rand(4,25),
    ];
});
