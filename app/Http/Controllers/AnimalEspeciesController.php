<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnimalEspecie;

class AnimalEspeciesController extends Controller {

    public function list() {
        return view('animalEspecies.list', [
            'animalEspecies' => AnimalEspecie::all()
        ]);
    }

    public function create() {
        $arStatus = [
            (object) ['id' => 1, 'name' => 'Ativo'],
            (object) ['id' => 0, 'name' => 'Inativo']
        ];

        return view('animalEspecies.create', [
            'arStatus' => $arStatus
        ]);
    }

    public function store(Request $request) {
        
        $requestValidated = $request->validate([
            'name' => 'required|unique:animal_families|max:255',
            'description' => 'required',
            'status' => 'required|integer|between:0,1',
        ]);

        $animalEspecie = new AnimalEspecie($requestValidated);

        $animalEspecie->save();

        return redirect()
                        ->route('animalEspecies.list')
                        ->with(['alert-success' => __('messages.created_success')]);
    }

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
