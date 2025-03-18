<?php

namespace App\Http\Controllers;

use App\Models\ArenaAnimal;
use App\Models\Animal;
use App\Models\PlayerAnimal;

class ArenaController extends Controller
{
    public function index()
    {
        return view('arenas.index', [
            'battles' => ArenaAnimal::with('playerAnimal')->paginate(Controller::DEFAULT_PAGE_SIZE)
        ]);
    }

    public function enterArena(int $player_animal_id)
    {

        $playerAnimal = PlayerAnimal::findOrFail($player_animal_id);

        // Verifica se o animal já está na arena
        if (ArenaAnimal::where('player_animal_id', $playerAnimal->id)->exists()) {
            return response()->redirectToRoute('arena.index')->with(['message' => 'Este animal já está na arena.'], 400);
        }

        // Adiciona o animal à arena
        ArenaAnimal::create([
            'player_id' => $playerAnimal->player_id,
            'player_animal_id' => $playerAnimal->id
        ]);

        return response()->redirectToRoute('arena.index')->with(['message' => 'Animal enviado para a arena!'], 201);
    }
}
