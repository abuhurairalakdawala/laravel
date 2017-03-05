<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->mediumInteger('status_id')->unsigned();
            $table->tinyInteger('order_quantity')->unsigned()->default(0);
            $table->dateTime('inward_date')->nullable()->default(null);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('order_statuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
