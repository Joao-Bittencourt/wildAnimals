<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Animal;
use \App\Models\AnimalEspecie;
use \App\Models\AnimalFamily;

class AnimalsController extends Controller {

    public function list() {
        return view('animals.list', [
            'animals' => Animal::all()
        ]);
    }

    public function create() {

        $animalEspecies = AnimalEspecie::all();
        $animalFamilies = AnimalFamily::all();

        $arStatus = [
            (object) ['id' => 1, 'name' => 'Ativo'],
            (object) ['id' => 0, 'name' => 'Inativo']
        ];
        return view('animals.create', [
            'animalEspecies' => $animalEspecies,
            'animalFamilies' => $animalFamilies,
            'arStatus' => $arStatus,
        ]);
    }

    public function store(Request $request) {
        $requestValidated = $request->validate([
            'name' => 'required|unique:animals|max:255',
            'description' => 'required',
            'animal_especie_id' => 'required|integer',
            'animal_family_id' => 'required|integer',
            'status' => 'required|integer|between:0,1',
        ]);

        $animal = new Animal($requestValidated);

        $animal->save();

        return redirect()
                        ->route('animals.list')
                        ->with(['alert-success' => __('messages.created_success')]);
    }

}
