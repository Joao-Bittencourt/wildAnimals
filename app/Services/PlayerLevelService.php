<?php

namespace App\Services;

use App\Models\Player;

class PlayerLevelService
{
    private $levelService;

    public function __construct(LevelService $levelService)
    {
        $this->levelService = $levelService;
    }

    public function addXp(Player $player, int $xp): void
    {
        $player->xp += $xp;

        $xpMaxLevel = $this->levelService->getXpPerLevel($player->current_level);
        if ($player->xp >= $xpMaxLevel) {
            $player->current_level += 1;
            $player->xp = 0;
        }

        $player->save();
    }
}
