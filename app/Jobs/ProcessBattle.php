<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Battle;
use App\Models\BattleTurn;
use App\Models\PlayerAnimal;

class ProcessBattle implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    protected $battle;

    public function __construct(Battle $battle)
    {
        $this->battle = $battle;
    }

    public function handle()
    {
        $battle = $this->battle;

        $playerAnimal = PlayerAnimal::find($battle->player_animal_id);
        $playerAnimalB = PlayerAnimal::find($battle->b_player_animal_id);


        $attacker = $playerAnimal;
        $defender = $playerAnimalB;

        // Loop da batalha
        while ($playerAnimal->hp > 0 && $playerAnimalB->hp > 0) {
            $damage = $attacker->attack - $defender->defense;
            $defender->health -= $damage;

            // Registra o turno
            BattleTurn::create([
                'battle_id' => $battle->id,
                'animal_id' => $attacker->id,
                'b_animal_id' => $defender->id,
                'attack' => $attacker->attack,
                'defense' => $defender->defense,
                'damage_received' => $damage
            ]);

            // Verifica se o defensor foi derrotado
            if ($defender->health <= 0) {
                $battle->update(['winner_player_animal_id' => $attacker->id]);
                return;
            }

            // Alterna atacante e defensor
            [$attacker, $defender] = [$defender, $attacker];
        }
    }
}
