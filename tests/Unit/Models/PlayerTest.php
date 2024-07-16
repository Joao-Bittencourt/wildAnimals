<?php

namespace Tests\Unit\Models;

use App\Models\Player;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class PlayerTest extends TestCase
{
    public $player;

    public function setUp(): void
    {
        parent::setUp();
        $this->player = new Player();
    }

    public function test_player_belongs_to_user(): void
    {
        $this->assertInstanceOf(BelongsTo::class, $this->player->user());
    }
}
