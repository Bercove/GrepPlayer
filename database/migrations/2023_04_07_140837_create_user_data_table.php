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
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user')->unsigned()->nullable();
            $table->foreign('user')->references('id')->on('users');

            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('bd')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('tel')->nullable();
            $table->string('country')->nullable();
            $table->longText('about')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};
