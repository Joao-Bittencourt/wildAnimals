<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerAnimalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        $playerAnimals = \App\Models\PlayerAnimal::all();
        return view('playerAnimals.list', ['animals' => $playerAnimals]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
