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
        Schema::create('members', function (Blueprint $table) {
            $table->increments('MemberID');
            $table->string('FirstName', 32);
            $table->string('LastName', 32);
            $table->tinyInteger('MemberStatusID')->unsigned();
            $table->date('DateOfBirth');
            $table->tinyInteger('GenderID')->unsigned();
            $table->string('Address', 64);
            $table->char('Phone', 10);
            $table->string('Email', 256);
            $table->timestamps();

            $table->foreign('GenderID')->references('GenderID')->on('genders');
            $table->foreign('MemberStatusID')->references('MemberStatusID')->on('member_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
