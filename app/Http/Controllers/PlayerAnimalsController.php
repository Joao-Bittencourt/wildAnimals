<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use App\Models\PlayerAnimal;

class PlayerAnimalsController extends Controller {

    public function list() {
        
        $playerLoggedId = Auth::user()->player->id ?? 0;
        $playerAnimals = PlayerAnimal::all()->where('player_id', $playerLoggedId);
        return view('playerAnimals.list', ['playerAnimals' => $playerAnimals]);
    }

    public function explorer() {
        
        $animalFamilies = \App\Models\AnimalFamily::has('animals')->get();
        return view('playerAnimals.explorer', [
            'animalFamilies' => $animalFamilies,
            'timeExploration' => session('timeExploration')
        ]);
    }
    
    public function explor(Request $request) {
        
        $playerId = Auth::user()->player->id;
        
        if (Cache::has('player-in-exploring-' . $playerId)) {
            return redirect(route('playerAnimals.explorer'))->with([
                'messages' => [
                    'message' => __('messages.playerAnimals_player_in_exploring')
                ],
                'timeExploration' => Cache::get('player-in-exploring-' . $playerId) 
            ]);
        }
      
        $animalFamilyId = $request->animal_family_id ?? 0;
        
        $animal = \App\Models\Animal::inRandomOrder()->where('animal_family_id', $animalFamilyId)->get()->first();
      
        $faker = Faker\Factory::create();
        $animalPlayer = [
            'animal_id' => $animal->id,
            'player_id' => $playerId,
            'name' => $faker->name(),
            'hp' => $faker->numberBetween($animal->min_hp, $animal->max_hp),
            'attack' => $faker->numberBetween($animal->min_attack, $animal->max_attack),
            'defense' => $faker->numberBetween($animal->min_defense, $animal->max_defense),
            'status' => 1
        ];
        
        
        $playerAnimal = new PlayerAnimal($animalPlayer);
        $playerAnimal->save();

        $timeExploration = date('s', strtotime('now + 29 seconds'));
        Cache::put('player-in-exploring-' . $playerId, $timeExploration, 30);
        
        return redirect(route('playerAnimals.explorer'))->with([
            'timeExploration' => $timeExploration 
        ]);
    }
//    public function store(Request $request) {
//        //
//    }
//
//    public function update(Request $request, string $id) {
//        //
//    }
//
//    public function show(string $id) {
//        //
//    }
//
//    public function destroy(string $id) {
//        //
//    }
}
