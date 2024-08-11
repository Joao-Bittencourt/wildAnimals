<?php

namespace App\Http\Controllers;

use App\Models\PlayerAnimal;
use App\Services\LevelService;
use App\Services\PlayerLevelService;
use DateTime;
use Faker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PlayerAnimalsController extends Controller
{
    public function list()
    {
        $playerLoggedId = Auth::user()->player->id ?? 0;
        $playerAnimals = PlayerAnimal::with('animal')
            ->where('player_id', $playerLoggedId)
            ->paginate(Controller::DEFAULT_PAGE_SIZE);

        return view('playerAnimals.list', ['playerAnimals' => $playerAnimals]);
    }

    public function show(PlayerAnimal $playerAnimal)
    {
        return view('playerAnimals.show', ['playerAnimal' => $playerAnimal]);
    }

    public function explorer()
    {
        $animalFamilies = \App\Models\AnimalFamily::has('animals')->get();

        $playerLoggedId = Auth::user()->player->id ?? 0;
        $timeExploration = Cache::get('player-in-exploring-' . $playerLoggedId);
        $time = $timeExploration ? (new DateTime($timeExploration))->diff(new DateTime(now()))->s : null;

        return view('playerAnimals.explorer', [
            'animalFamilies' => $animalFamilies,
            'timeExploration' => $time,
        ]);
    }

    public function explor(Request $request)
    {
        $playerId = Auth::user()->player->id;

        if (Cache::has('player-in-exploring-' . $playerId)) {
            $timeExploration = Cache::get('player-in-exploring-' . $playerId);
            $time =  (new DateTime($timeExploration))->diff(new DateTime(now()))->s;
            return redirect(route('playerAnimals.explorer'))->with([
                'messages' => [
                    'message' => __('messages.playerAnimals_player_in_exploring'),
                ],
                'timeExploration' => $time,
            ]);
        }

        $animalFamilyId = $request->animal_family_id ?? 0;

        $animal = \App\Models\Animal::inRandomOrder()->where('animal_family_id', $animalFamilyId)->get()->first();

        $faker = Faker\Factory::create();
        $animalPlayer = [
            'animal_id' => $animal->id,
            'player_id' => $playerId,
            'name' => $faker->name(),
            'hp' => $faker->numberBetween($animal->min_hp, $animal->max_hp),
            'attack' => $faker->numberBetween($animal->min_attack, $animal->max_attack),
            'defense' => $faker->numberBetween($animal->min_defense, $animal->max_defense),
            'status' => 1,
        ];

        $playerAnimal = new PlayerAnimal($animalPlayer);
        $playerAnimal->save();

        $plaerService = new PlayerLevelService(new LevelService());
        $plaerService->addXp(Auth::user()->player, 15);

        $timeExplorationCache = $animal->animalFamily->time_exploration ?? 30;
        $timeExploration = date('Y-m-d H:i:s', strtotime("+{$timeExplorationCache} seconds"));
        Cache::put('player-in-exploring-' . $playerId, $timeExploration, $timeExplorationCache);

        return redirect(route('playerAnimals.explorer'))->with([
            'timeExploration' => $timeExploration,
        ]);
    }
}
