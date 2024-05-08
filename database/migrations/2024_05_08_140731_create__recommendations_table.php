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
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('userID');
            $table->foreign('userID')->references('userID')->on('users');

            $table->unsignedBigInteger('ProgramID');
            $table->foreign('ProgramID')->references('ProgramID')->on('programs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_recommendations');
    }
};
