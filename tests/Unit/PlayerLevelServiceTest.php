<?php

namespace Tests\Unit;

use App\Models\Player;
use App\Models\User;
use App\Services\LevelService;
use App\Services\PlayerLevelService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayerLevelServiceTest extends TestCase
{
    use RefreshDatabase;

    private $playerLevelService;
    private $levelService;

    public function setUp(): void
    {
        parent::setUp();
        $this->levelService = new LevelService();
        $this->playerLevelService = new PlayerLevelService($this->levelService);
    }

    public function test_add_xp(): void
    {
        $user = User::factory()->create();
        $player = Player::factory()->create(['user_id' => $user->id]);

        $player->xp = 0;
        $player->current_level = 0;

        $this->playerLevelService->addXp($player, 100);
        $this->assertEquals(100, $player->xp);
        $this->assertEquals(2, $player->current_level);

        $this->playerLevelService->addXp($player, 10);
        $this->assertEquals(110, $player->xp);
        $this->assertEquals(2, $player->current_level);

        $this->playerLevelService->addXp($player, 44);
        $this->assertEquals(154, $player->xp);
        $this->assertEquals(3, $player->current_level);
    }
}
