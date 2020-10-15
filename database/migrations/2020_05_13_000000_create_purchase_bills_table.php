<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_bills', function (Blueprint $table) {
            $table->id();
            $table->integer('bill_number')->unique();
            $table->double('discount', 4, 2)->default(0);
            $table->double('tax', 4, 2)->default(0);
            $table->double('total', 8, 2)->default(0);
            $table->foreignId('supplier_id');
            $table->foreignId('stock_id');
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
        Schema::dropIfExists('purchase_bills');
    }
}
