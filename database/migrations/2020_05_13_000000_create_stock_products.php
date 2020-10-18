<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_id');
            $table->foreignId('product_id');
            $table->foreignId('saleBill_id')->nullable();
            $table->foreignId('purchaseBill_id')->nullable();
            $table->integer('first_balance');
            $table->integer('additions')->default(0);
            $table->integer('outgoing')->default(0);
            $table->integer('end_balance');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_products');
    }
}
