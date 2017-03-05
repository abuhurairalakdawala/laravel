<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SkuUnique extends Migration
{
    public function up()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->string('sku', 50)->unique()->change();
        });
    }

    public function down()
    {
        Schema::table('products', function(Blueprint $table) {
            $table->string('sku', 50)->change();
        });
    }
}
