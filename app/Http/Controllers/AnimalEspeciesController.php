<?php

namespace App\Http\Controllers;

use App\Models\AnimalEspecie;
use Illuminate\Http\Request;

class AnimalEspeciesController extends Controller
{
    public function list()
    {
        return view('animalEspecies.list', [
            'animalEspecies' => AnimalEspecie::paginate(Controller::DEFAULT_PAGE_SIZE),
        ]);
    }

    public function create()
    {
        $arStatus = [
            (object) ['id' => 1, 'name' => 'Ativo'],
            (object) ['id' => 0, 'name' => 'Inativo'],
        ];

        return view('animalEspecies.create', [
            'arStatus' => $arStatus,
        ]);
    }

    public function store(Request $request)
    {
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
}
