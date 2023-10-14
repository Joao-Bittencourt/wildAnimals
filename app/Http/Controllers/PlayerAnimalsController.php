<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker;

class PlayerAnimalsController extends Controller {

    public function list() {
        $playerAnimals = \App\Models\PlayerAnimal::all();
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
            'player_id' => 1,
            'name' => $faker->name(),
            'power' => $faker->numberBetween($animal->min_power, $animal->max_power),
            'status' => 1
        ];
        
        
        \App\Models\PlayerAnimal::create($animalPlayer);
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
