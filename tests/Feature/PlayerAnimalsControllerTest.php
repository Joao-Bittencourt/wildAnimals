<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class PlayerAnimalsControllerTest extends TestCase {

    use RefreshDatabase;

    public function testListPlayersAnimalsGetRequestSuccess(): void {

        $loggedUser = User::factory()->create();

        $response = $this
                ->actingAs($loggedUser)
                ->get(route('playerAnimals.list'));

        $response->assertViewIs('playerAnimals.list');
        $response->assertStatus(200);
    }
    
    public function testExplorerPlayersAnimalsGetRequestSuccess(): void {

        $loggedUser = User::factory()->create();

        $response = $this
                ->actingAs($loggedUser)
                ->get(route('playerAnimals.explorer'));

        $response->assertViewIs('playerAnimals.explorer');
        $response->assertStatus(200);
    }
    
    public function testExplorPlayersAnimalsPostRequestSuccess(): void {

         $loggedUser = User::factory()
                ->has(\App\Models\Player::factory()->count(1))
                ->create();
        $this->actingAs($loggedUser);

        $animalFamily = \App\Models\AnimalFamily::factory()->create();
        \App\Models\AnimalEspecie::factory()->create();
        \App\Models\Animal::factory()->create();
        
        $response = $this->post(route('playerAnimals.explor'), [
            'animal_family_id' => $animalFamily->id,
        ]);

        $response->assertRedirect(route('playerAnimals.explorer'));
        $response->assertStatus(302);
    }

}
