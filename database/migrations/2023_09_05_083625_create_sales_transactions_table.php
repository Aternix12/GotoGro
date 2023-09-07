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
        Schema::create('sales_transactions', function (Blueprint $table) {
            $table->increments('TransactionID');
            $table->integer('MemberID')->unsigned();
            $table->date('TransactionDate');
            $table->tinyInteger('OrderStatusID')->unsigned();

            $table->foreign('MemberID')->references('MemberID')->on('members');
            $table->foreign('OrderStatusID')->references('OrderStatusID')->on('order_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_transactions');
    }
};
