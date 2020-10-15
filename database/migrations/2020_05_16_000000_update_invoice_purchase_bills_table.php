<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInvoicePurchaseBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_purchase_bills', function (Blueprint $table) {

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->foreign('purchase_bill_id')->references('id')->on('purchase_bills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_purchase_bills', function (Blueprint $table) {

            $table->dropForeign('product_id');
            $table->dropForeign('purchase_bill_id');
            $table->dropForeign('stock_id');
        });
    }
}
