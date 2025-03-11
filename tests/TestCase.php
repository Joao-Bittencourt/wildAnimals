<?php

namespace Tests;

use App\Models\Player;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    protected $userAdmin;

    public function setUp(): void
    {
        parent::setUp();
        $this->userAdmin = User::factory()
            ->has(Player::factory()->count(1))
            ->create();
        ;
    }
}
