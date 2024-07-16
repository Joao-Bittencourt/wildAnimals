<?php

namespace Tests\Unit\Models;

use App\Models\PlayerAnimal;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class PlayerAnimalTest extends TestCase
{
    public $playerAnimal;

    public function setUp(): void
    {
        parent::setUp();
        $this->playerAnimal = new PlayerAnimal();
    }

    public function test_player_animal_belongs_to_animal(): void
    {
        $this->assertInstanceOf(BelongsTo::class, $this->playerAnimal->animal());
    }

    public function test_player_animal_belongs_to_player(): void
    {
        $this->assertInstanceOf(BelongsTo::class, $this->playerAnimal->player());
    }
}
