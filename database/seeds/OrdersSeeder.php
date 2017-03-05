<?php

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Order::class, 5)->create();
    }
}
