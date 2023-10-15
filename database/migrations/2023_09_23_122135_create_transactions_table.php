<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('MemberID');
            $table->unsignedTinyInteger('OrderStatusID');
            $table->foreign('MemberID')->references('MemberID')->on('members');
            $table->foreign('OrderStatusID')->references('OrderStatusID')->on('order_statuses');
            $table->decimal('TotalAmount', 8, 2);
            $table->timestamp('Date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
