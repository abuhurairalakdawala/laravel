<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'customer_name' => $faker->name
    ];
});
$factory->define(App\Product::class, function (Faker\Generator $faker) {
	return [
		'product_name' => str_random(10),
		'sku' => str_random(15)
	];
});
$factory->define(App\Order::class, function (Faker\Generator $faker) {
	return [
		'product_id' => rand(1,20),
		'customer_id' => rand(1,20),
		'status_id' => rand(1,6),
		'order_quantity' => rand(1,10)
	];
});
