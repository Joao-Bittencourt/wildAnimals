<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class animalFactory extends Factory {

    public function definition(): array {
        
        $animalEspecies = \App\Models\AnimalEspecie::all()->pluck('id');
        $animalFamilies = \App\Models\AnimalFamily::all()->pluck('id');
        
        return [
            'animal_especie_id' => $this->faker->randomElement($animalEspecies->toArray()),
            'animal_family_id' => $this->faker->randomElement($animalFamilies->toArray()),
            'name' => $this->faker->name(),
            'description' => $this->faker->name(),
            'max_power' => $this->faker->numberBetween(2048, 4096),
            'min_power' => $this->faker->numberBetween(1, 2048),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

}
