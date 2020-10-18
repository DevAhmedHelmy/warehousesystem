<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAccountTransactionsTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('account_transactions', function (Blueprint $table) {

            $table->foreign('purchase_bill_id')->references('id')->on('purchase_bills')->onDelete('cascade');
            $table->foreign('sale_bill_id')->references('id')->on('sale_bills')->onDelete('cascade');
            $table->foreign('client_account_id')->references('id')->on('client_accounts')->onDelete('cascade');
            $table->foreign('supplier_account_id')->references('id')->on('supplier_accounts')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('account_transactions', function (Blueprint $table) {

            $table->dropForeign('client_account_id');
            $table->dropForeign('supplier_account_id');
            $table->dropForeign('sale_bill_id');
            $table->dropForeign('purchase_bill_id');
            
        });
    }
}
