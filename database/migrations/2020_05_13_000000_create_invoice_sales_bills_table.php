<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceSalesBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_sales_bills', function (Blueprint $table) {
            $table->id('id');
            $table->integer('quantity');
            $table->double('discount', 4, 2)->nullable();
            $table->double('tax', 4, 2)->nullable();
            $table->double('total', 8, 2)->nullable();
            $table->foreignId('product_id');
            $table->foreignId('sale_bill_id');
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
        Schema::dropIfExists('invoice_sales_bills');
    }
}
