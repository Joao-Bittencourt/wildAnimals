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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->integer('animal_especie_id')->references('id')->on('animal_especies');
            $table->integer('animal_family_id')->references('id')->on('animals_families');
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('status')->default('1');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
