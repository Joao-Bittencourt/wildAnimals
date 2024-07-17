<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    public function definition(): array
    {
        $animalEspecies = \App\Models\AnimalEspecie::all()->pluck('id');
        $animalFamilies = \App\Models\AnimalFamily::all()->pluck('id');

        return [
            'animal_especie_id' => $this->faker->randomElement($animalEspecies->toArray()),
            'animal_family_id' => $this->faker->randomElement($animalFamilies->toArray()),
            'name' => $this->faker->name(),
            'description' => $this->faker->name(),
            'min_hp' => $this->faker->numberBetween(1, 2048),
            'max_hp' => $this->faker->numberBetween(2048, 4096),
            'min_attack' => $this->faker->numberBetween(1, 200),
            'max_attack' => $this->faker->numberBetween(200, 500),
            'min_defense' => $this->faker->numberBetween(1, 200),
            'max_defense' => $this->faker->numberBetween(200, 500),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
