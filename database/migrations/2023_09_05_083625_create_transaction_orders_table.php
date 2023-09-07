<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transaction_orders', function (Blueprint $table) {
            $table->integer('TransactionID')->unsigned();
            $table->integer('GroceryID')->unsigned();
            $table->integer('Quantity')->unsigned();

            $table->primary(['TransactionID', 'GroceryID']);

            $table->foreign('TransactionID')->references('TransactionID')->on('sales_transactions');
            $table->foreign('GroceryID')->references('GroceryID')->on('grocery_items');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_orders');
    }
};
