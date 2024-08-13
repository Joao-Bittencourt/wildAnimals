<?php

namespace App\Http\Controllers;

use App\Models\PlayerAnimal;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function welcome()
    {
        $topAnimals = Cache::remember('top-ten-animals', 60 * 10, function () {
            return PlayerAnimal::with('animal')
                ->orderBy('attack', 'desc')
                ->orderBy('defense', 'desc')
                ->orderBy('hp', 'desc')
                ->take(10)
                ->get();
        });

        return view('welcome', [
            'topAnimals' => $topAnimals
        ]);
    }
}
