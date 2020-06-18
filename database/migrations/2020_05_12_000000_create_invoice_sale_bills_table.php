<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceSaleBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_sale_bills', function (Blueprint $table) {
            $table->id('id');
            $table->integer('quantity');
            $table->double('discount', 4, 2)->default(0);
            $table->double('tax', 4, 2)->default(0);
            $table->double('total', 8, 2)->default(0);
            $table->foreignId('product_id');
            $table->foreignId('stock_id');
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
        Schema::dropIfExists('invoice_sale_bills');
    }
}
