<?php

namespace Database\Factories;

use App\Models\Battle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BattleTurnFactory extends Factory
{
    public function definition(): array
    {
        $battle = Battle::inRandomOrder()->first()->id ?? Battle::factory()->create()->id;

        $attack = $battle->player_animal->attack;
        $defense = $battle->b_player_animal->defense;

        return [
            'battle_id' => $battle->id,
            'animal_id' => $battle->player_animal_id,
            'b_animal_id' => $battle->b_player_animal_id,
            'attack' => $attack,
            'defense' => $defense,
            'damage_received' => $attack - $defense,
        ];
    }
}
