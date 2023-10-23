<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker;
use Illuminate\Support\Facades\Auth;
use App\Models\PlayerAnimal;

class PlayerAnimalsController extends Controller {

    public function list() {
        
        $playerLoggedId = Auth::user()->player->id ?? 0;
        $playerAnimals = PlayerAnimal::all()->where('player_id', $playerLoggedId);
        return view('playerAnimals.list', ['playerAnimals' => $playerAnimals]);
    }

    public function explorer() {
        
        $animalFamilies = \App\Models\AnimalFamily::all();
        return view('playerAnimals.explorar', ['animalFamilies' => $animalFamilies]);
    }
    
    public function explor(Request $request) {
        
        
        $animalFamilyId = $request->animal_family_id ?? 0;
        
        $animal = \App\Models\Animal::inRandomOrder()->where('animal_family_id', $animalFamilyId)->get()->first();
    
        $faker = Faker\Factory::create();
        $animalPlayer = [
            'animal_id' => $animal->id,
            'player_id' => Auth::user()->player->id,
            'name' => $faker->name(),
            'hp' => $faker->numberBetween($animal->min_hp, $animal->max_hp),
            'attack' => $faker->numberBetween($animal->min_attack, $animal->max_attack),
            'defense' => $faker->numberBetween($animal->min_defense, $animal->max_defense),
            'status' => 1
        ];
        
        $playerAnimal = new PlayerAnimal($animalPlayer);
        $playerAnimal->save();
        
        return redirect(route('playerAnimals.list'));
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
