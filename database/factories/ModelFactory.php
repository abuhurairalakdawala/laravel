<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'customer_name' => $faker->name
    ];
});
$factory->define(App\Product::class, function (Faker\Generator $faker) {
	return [
		'product_name' => $faker->word,
		'sku' => $faker->word
	];
});
$factory->define(App\Order::class, function (Faker\Generator $faker) {
	return [
		'product_id' => rand(1,50),
		'customer_id' => rand(1,50),
		'status_id' => rand(1,6),
		'order_quantity' => rand(1,20)
	];
});
$factory->define(App\Models\Article::class, function (Faker\Generator $faker) {
	return [
		'name' => str_random(10),
		'description' => str_random(15)
	];
});