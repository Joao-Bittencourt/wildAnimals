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
        Schema::create('players_animals', function (Blueprint $table) {
            $table->id();
            $table->integer('animal_id')->references('id')->on('animals');
            $table->integer('player_id')->references('id')->on('players');
            $table->integer('status')->default('1'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players_animals');
    }
};
