<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusesTable extends Migration
{
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->char('name',50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_statuses');
    }
}
