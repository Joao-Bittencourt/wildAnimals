<?php

namespace Database\Factories;

use App\Models\Player;
use App\Models\PlayerAnimal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Battle>
 */
class BattleFactory extends Factory
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
            ])->id;

        $bPlayerId = Player::inRandomOrder()->first()->id ?? Player::factory()->create()->id;
        $bPlayerAnimalId = PlayerAnimal::where('player_id', $bPlayerId)
            ->inRandomOrder()
            ->first()
            ->id ??
            PlayerAnimal::factory()
            ->create([
                'player_id' => $bPlayerId
            ])->id;

        return [
            'player_id' => $playerId,
            'player_animal_id' => $playerAnimalId,
            'b_player_id' => $bPlayerId,
            'b_player_animal_id' => $bPlayerAnimalId,
            'winner_player_animal_id' => null
        ];
    }
}
