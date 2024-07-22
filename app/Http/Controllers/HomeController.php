<?php

namespace App\Http\Controllers;

use App\Models\PlayerAnimal;

class HomeController extends Controller
{
    public function welcome()
    {
        $topAnimals = PlayerAnimal::with('animal')
            ->orderBy('attack', 'desc')
            ->orderBy('defense', 'desc')
            ->orderBy('hp', 'desc')
            ->take(10)
            ->get();

        return view('welcome', [
            'topAnimals' => $topAnimals
        ]);
    }
}
