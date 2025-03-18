<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\PlayerAnimal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArenaAnimal>
 */
class ArenaAnimalFactory extends Factory
{
    public function definition(): array
    {
        $playerId = Player::inRandomOrder()->first()->id ?? Player::factory()->create()->id;
        $playerAnimalId = PlayerAnimal::where('player_id', $playerId)
            ->inRandomOrder()
            ->first()
            ->id ??
            PlayerAnimal::factory()
            ->create([
                'player_id' => $playerId
            ])
            ->id;

        return [
            'player_id' => $playerId,
            'player_animal_id' => $playerAnimalId
        ];
    }
}
