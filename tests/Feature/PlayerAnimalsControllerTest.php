<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class PlayerAnimalsControllerTest extends TestCase {

    use RefreshDatabase;

    public function testListPlayesAnimalsGetRequestSuccess(): void {

        $loggedUser = User::factory()->create();

        $response = $this
                ->actingAs($loggedUser)
                ->get(route('playerAnimals.list'));

        $response->assertViewIs('playerAnimals.list');
        $response->assertStatus(200);
    }

}
