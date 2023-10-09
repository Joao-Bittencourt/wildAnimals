<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlayerAnimalsControllerTest extends TestCase {

    public function testListPlayesAnimalsGetRequestSuccess(): void {
        $response = $this->get('/player-animals');

        $response->assertViewIs('playerAnimals.list');
        $response->assertStatus(200);
    }

}
