<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlayerFactory extends Factory
{
    public function definition(): array
    {

        return [
            'name' => $this->faker->name(),
            'nick_name' => $this->faker->lexify(),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
