<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArenaAnimal;
use App\Models\Animal;
use App\Models\PlayerAnimal;

class ArenaController extends Controller
{
    public function enterArena(Request $request)
    {
        $request->validate([
            'player_animal_id' => ['required', 'exists:player_animals,id']
        ]);

        $playerAnimal = PlayerAnimal::find($request->player_animal_id);

        // Verifica se o animal já está na arena
        if (ArenaAnimal::where('player_animal_id', $playerAnimal->id)->exists()) {
            return response()->json(['message' => 'Este animal já está na arena.'], 400);
        }

        // Adiciona o animal à arena
        ArenaAnimal::create([
            'player_id' => $playerAnimal->player_id,
            'player_animal_id' => $playerAnimal->id
        ]);

        return response()->json(['message' => 'Animal enviado para a arena!'], 201);
    }
}
