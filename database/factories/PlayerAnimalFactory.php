<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerAnimalFactory extends Factory {

    public function definition(): array {

        $animals = \App\Models\Animal::all()->pluck('id');
        $players = \App\Models\Player::all()->pluck('id');

        $animalId = $this->faker->randomElement($animals->toArray());
        $animal = \App\Models\Animal::get($animalId)->first();
       
        return [
            'animal_id' => $animalId,
            'player_id' => $this->faker->randomElement($players->toArray()),
            'name' => $this->faker->name(),
            'power' => $this->faker->numberBetween($animal->min_power, $animal->max_power),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

}
