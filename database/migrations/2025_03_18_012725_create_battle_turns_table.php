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
        Schema::create('battle_turns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('battle_id')->constrained('battles');
            $table->foreignId('animal_id')->constrained('player_animals');
            $table->foreignId('b_animal_id')->constrained('player_animals');

            $table->integer('attack');
            $table->integer('defense');
            $table->integer('damage_received'); // dano recebido = ataque - defesa


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('battle_turns');
    }
};
