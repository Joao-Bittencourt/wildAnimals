<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class LevelService
{
    public function getXpPerLevel(int $level, bool $force = false): int
    {
        if ($force) {
            return $this->calculateXp($level);
        }

        $xpPerLevel = Cache::remember('xp-per-level-' . $level, 60 * 60 * 24, function () use ($level) {
            return $this->calculateXp($level);
        });

        return $xpPerLevel;
    }

    public function calculateXp(int $level): int
    {
        $xp = 0;
        for ($x = 1; $x < $level; $x++) {
            $xp += floor($x + (265 * (2 ** ($x / 7))));
        }

        return floor($xp / 4);
    }

    public function getLevel(int $xp, bool $force = false): int
    {
        if ($force) {
            return $this->calculateLevel($xp);
        }

        return Cache::remember('xp-in-level-' . $xp, 60 * 60 * 24, function () use ($xp) {
            return $this->calculateLevel($xp);
        });
    }

    public function calculateLevel(int $xp): int
    {
        $level = 1;
        while (true) {
            $maxXpPerLevel = $this->getXpPerLevel($level);
            if ($xp < $maxXpPerLevel) {
                return $level - 1;
            }
            $level++;

            // Prevent infinite loop
            if ($level > 51) {
                die('level ' . $level . ' xp ' . $xp);
            }
        }

        return $level;
    }
}
