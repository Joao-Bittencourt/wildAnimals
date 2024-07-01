<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalEspecie;
use App\Models\AnimalFamily;
use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    public function list()
    {
        return view('animals.list', [
            'animals' => Animal::paginate(Controller::DEFAULT_PAGE_SIZE),
        ]);
    }

    public function create()
    {

        $animalEspecies = AnimalEspecie::all();
        $animalFamilies = AnimalFamily::all();

        $arStatus = [
            (object) ['id' => 1, 'name' => 'Ativo'],
            (object) ['id' => 0, 'name' => 'Inativo'],
        ];

        return view('animals.create', [
            'animalEspecies' => $animalEspecies,
            'animalFamilies' => $animalFamilies,
            'arStatus' => $arStatus,
        ]);
    }

    public function store(Request $request)
    {
        $requestValidated = $request->validate([
            'name' => 'required|unique:animals|max:255',
            'description' => 'required|string',
            'min_hp' => 'required|integer|rangeAnimalsStats:<,max_hp',
            'max_hp' => 'required|integer|rangeAnimalsStats:>,min_hp',
            'min_attack' => 'required|integer|rangeAnimalsStats:<,max_attack',
            'max_attack' => 'required|integer|rangeAnimalsStats:>,min_attack',
            'min_defense' => 'required|integer|rangeAnimalsStats:<,max_defense',
            'max_defense' => 'required|integer|rangeAnimalsStats:>,min_defense',
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
