<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFamilyFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->name(),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
