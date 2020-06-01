<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateInvoiceSalesBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_sales_bills', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('sales_bill_id')->references('id')->on('sale_bills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_sales_bills', function (Blueprint $table) {

            $table->dropForeign('product_id');
            $table->dropForeign('sales_bill_id');
        });
    }
}
