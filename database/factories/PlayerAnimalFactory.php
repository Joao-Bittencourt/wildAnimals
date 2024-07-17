<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerAnimalFactory extends Factory
{
    public function definition(): array
    {
        $animals = \App\Models\Animal::all()->pluck('id');
        $players = \App\Models\Player::all()->pluck('id');

        $animalId = $this->faker->randomElement($animals->toArray());
        $animal = \App\Models\Animal::get($animalId)->first();

        return [
            'animal_id' => $animalId,
            'player_id' => $this->faker->randomElement($players->toArray()),
            'name' => $this->faker->name(),
            'hp' => $this->faker->numberBetween($animal->min_hp, $animal->max_hp),
            'attack' => $this->faker->numberBetween($animal->min_attack, $animal->max_attack),
            'defense' => $this->faker->numberBetween($animal->min_defense, $animal->max_defense),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
