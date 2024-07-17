<?php

namespace App\Http\Controllers;

use App\Models\AnimalFamily;
use Illuminate\Http\Request;

class AnimalFamiliesController extends Controller
{
    public function list()
    {
        return view('animalFamilies.list', [
            'animalFamilies' => AnimalFamily::paginate(Controller::DEFAULT_PAGE_SIZE),
        ]);
    }

    public function create()
    {
        $arStatus = [
            (object) ['id' => 1, 'name' => 'Ativo'],
            (object) ['id' => 0, 'name' => 'Inativo'],
        ];

        return view('animalFamilies.create', [
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

        $animalFamily = new AnimalFamily($requestValidated);

        $animalFamily->save();

        return redirect()
            ->route('animalFamilies.list')
            ->with(['alert-success' => __('messages.created_success')]);
    }
}
