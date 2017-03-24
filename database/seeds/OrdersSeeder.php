<?php

use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Order::class, 50)->create()->each(function($o){
        	$solr = new \App\Facades\Solr('orders');
        	$add = $solr->addDocument(array(
        		'id'=>$o->id,
        		'product_sku' => $o->product->product_name,
        		'order_status' => $o->order_status->name,
        		'order_date' => strtotime($o->created_at),
        		'order_quantity' => $o->order_quantity,
        		'customer_name' => $o->customer->customer_name,
        		'product_name' => $o->product->sku,
        		'inward_date' => 0
        	));
        });
    }
}
