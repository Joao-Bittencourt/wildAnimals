<?php

namespace Tests\Unit;

use App\Services\LevelService;
use Tests\TestCase;

class LeveLServiceTest extends TestCase
{
    private $levelService;

    public function setUp(): void
    {
        parent::setUp();
        $this->levelService = new LevelService();
    }

    /**
    * @dataProvider xpPerLevelProvider
    */
    public function test_get_xp_per_level(int $level, int $xp): void
    {
        $this->assertEquals($xp, $this->levelService->calculateXp($level));
    }

    /**
    * @dataProvider xpPerLevelProvider
    */
    public function test_calculate_xp_per_level(int $level, int $xp): void
    {
        $this->assertEquals($xp, $this->levelService->calculateXp($level));
    }

    /**
    * @dataProvider xpLevelProvider
    */
    public function test_get_level($level, $xp): void
    {
        $this->assertEquals($level, $this->levelService->getLevel($xp));
    }

    /**
    * @dataProvider xpLevelProvider
    */
    public function test_calculate_level($level, $xp): void
    {
        $this->assertEquals($level, $this->levelService->calculateLevel($xp));
    }

    public static function xpPerLevelProvider()
    {
        return [
            [1, 0],
            [2, 73],
            [3, 154],
            [4, 244],
            [5, 343],
            [6, 453],
            [7, 574],
            [8, 709],
            [9, 857],
            [10, 1021],
            [15, 2133],
            [20, 3955],
            [25, 6936],
            [50, 89547],
        ];
    }

    public static function xpLevelProvider()
    {
        return [
            [1, 0],
            [1, 1],
            [1, 72],
            [2, 74],
            [2, 153],
            [3, 154],
            [3, 243],
            [4, 244],
            [4, 245],
            [5, 344],
            [6, 454],
            [7, 575],
            [8, 710],
            [9, 858],
            [10, 1022],
            [15, 2134],
            [20, 3956],
            [25, 6937],
            [50, 89548],
        ];
    }

}
