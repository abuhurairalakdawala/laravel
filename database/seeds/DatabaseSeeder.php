<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // factory(App\Customer::class, 50)->create();
        // factory(App\Product::class, 50)->create();
        // $this->add_order_status();
        $this->call(OrdersSeeder::class);
        // factory(App\Models\Article::class, 10)->create();
    }
    public function add_order_status()
    {
        DB::table('order_statuses')->insert([
            [ 'name' => 'Confirmed', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            [ 'name' => 'Shipped', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            [ 'name' => 'Cancelled', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            [ 'name' => 'Refunded', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            [ 'name' => 'Partly Shipped Order Complete', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            [ 'name' => 'Partly Shipped Order In-Complete', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s') ]
        ]);
    }
}
