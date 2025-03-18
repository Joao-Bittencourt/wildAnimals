<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('battles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('player_id')->constrained('players');
            $table->integer('player_animal_id')->references('id')->on('player_animals');

            $table->foreignId('b_player_id')->constrained('players');
            $table->integer('b_player_animal_id')->references('id')->on('player_animals');

            $table->foreignId('winner_player_animal_id')->nullable()->constrained('player_animals');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('battles');
    }
};
