<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlayerAnimalsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testListPlayersAnimalsGetRequestSuccess(): void
    {
        $response = $this
            ->actingAs($this->userAdmin)
            ->get(route('playerAnimals.list'));

        $response->assertViewIs('playerAnimals.list');
        $response->assertStatus(200);
    }

    public function testExplorerPlayersAnimalsGetRequestSuccess(): void
    {
        $response = $this
            ->actingAs($this->userAdmin)
            ->get(route('playerAnimals.explorer'));

        $response->assertViewIs('playerAnimals.explorer');
        $response->assertStatus(200);
    }

    public function testExplorPlayersAnimalsPostRequestSuccess(): void
    {
        $animalFamily = \App\Models\AnimalFamily::factory()->create();
        \App\Models\AnimalEspecie::factory()->create();
        \App\Models\Animal::factory()->create();

        $response = $this
            ->actingAs($this->userAdmin)
            ->post(route('playerAnimals.explor'), [
                'animal_family_id' => $animalFamily->id,
            ]);

        $response->assertRedirect(route('playerAnimals.explorer'));
        $response->assertStatus(302);
    }
}
