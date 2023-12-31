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

            $table->unsignedInteger('CategoryID');
            $table->foreign('CategoryID')->references('CategoryID')->on('categories');

            $table->unsignedInteger('DepartmentID');
            $table->foreign('DepartmentID')->references('DepartmentID')->on('departments');
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
