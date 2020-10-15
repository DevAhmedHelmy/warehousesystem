<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique()->nullable();
            $table->string('barcode')->nullable();
            $table->string('name');
            $table->double('purchase_price', 8, 2);
            $table->double('sale_price', 8, 2);
            $table->foreignId('company_id');
            $table->foreignId('category_id');
            $table->foreignId('unit_id');
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
