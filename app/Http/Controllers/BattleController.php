<?php

namespace App\Http\Controllers;

use App\Models\Battle;

class BattleController extends Controller
{
    public function index()
    {
        return view('battles.index', [
            'battles' => Battle::with('playerAnimal', 'bPlayerAnimal', 'winnerPlayerAnimal')->paginate(Controller::DEFAULT_PAGE_SIZE)
        ]);
    }

    public function show(Battle $battle)
    {
        return view('battles.show', [
            'battle' => Battle::with('playerAnimal', 'bPlayerAnimal', 'winnerPlayerAnimal')->where($battle->id)->first()
        ]);
    }
}
