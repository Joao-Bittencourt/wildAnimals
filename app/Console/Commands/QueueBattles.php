<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ArenaAnimal;
use App\Models\Battle;
use App\Jobs\ProcessBattle;

class QueueBattles extends Command
{
    protected $signature = 'battles:queue';
    protected $description = 'Adiciona batalhas à fila quando houver pelo menos dois animais na arena.';

    public function handle()
    {
        while (ArenaAnimal::count() >= 2) {
            $arenaAnimals = ArenaAnimal::inRandomOrder()
                ->limit(2)
                ->get();

            if ($arenaAnimals->count() < 2) {
                return;
            }

            // Criar a batalha
            $battle = Battle::create([
                'player_id' => $arenaAnimals[0]->player_id,
                'player_animal_id' => $arenaAnimals[0]->player_animal_id,
                'b_player_id' => $arenaAnimals[1]->player_id,
                'b_player_animal_id' => $arenaAnimals[1]->player_animal_id,
            ]);

            // Remover os animais da arena
            $arenaAnimals[0]->delete();
            $arenaAnimals[1]->delete();

            // Adicionar a batalha na fila para processamento
            ProcessBattle::dispatch($battle);
        }

        $this->info('Batalhas adicionadas à fila.');
    }
}
