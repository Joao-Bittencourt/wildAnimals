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
        $player->current_level = $this->levelService->getLevel($player->xp);
        $player->save();
    }

}
