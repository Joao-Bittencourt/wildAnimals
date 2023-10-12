<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
