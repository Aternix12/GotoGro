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
        Schema::create('location', function (Blueprint $table) {
            $table->increments('LocationID');
            $table->integer('DepartmentID') ->references('DepartmentID')->on('departments');
            // keep as char for special locations such as A11 or somthing idk
            $table->char('Shelf', 3);
            $table->char('Bay', 3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location');
    }
};
