<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateClientAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_accounts', function (Blueprint $table) {

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('sale_bill_id')->references('id')->on('sale_bills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_accounts', function (Blueprint $table) {
            $table->dropForeign('client_id');
            $table->dropForeign('sale_bill_id');
        });
    }
}
