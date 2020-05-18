<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('address');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('stock_products', function (Blueprint $table) {

            $table->unsignedBigInteger('stock_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->primary(['stock_id','product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
}
