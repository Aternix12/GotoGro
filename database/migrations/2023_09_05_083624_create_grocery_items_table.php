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
        Schema::create('grocery_items', function (Blueprint $table) {
            $table->increments('GroceryID');
            $table->string('ProductName', 64);
            $table->integer('Stock')->unsigned();
            $table->float('Price');
            $table->char('Location', 32);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grocery_items');
    }
};
