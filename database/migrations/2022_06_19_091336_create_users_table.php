<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->dateTime('date_of_birth');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('gender', 1);
            $table->unsignedInteger('country_code');
            $table->foreign('country_code')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedInteger('phone_number');
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
        Schema::dropIfExists('users');
    }
};