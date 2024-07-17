<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnimalsControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testListAnimalGetRequestSuccess(): void
    {
        $response = $this->get(route('animals.list'));

        $response->assertViewIs('animals.list');
        $response->assertStatus(200);
    }

    public function testCreateAnimalGetRequestSuccess(): void
    {
        $loggedUser = User::factory()->create();

        $response = $this
            ->actingAs($loggedUser)
            ->get(route('animals.create'));

        $response->assertViewIs('animals.create');
        $response->assertStatus(200);
    }

    public function testStoreAnimalPostRequestSuccess(): void
    {
        $loggedUser = User::factory()->create();
        $this->actingAs($loggedUser);

        $animalEspecie = \App\Models\AnimalEspecie::factory()->create();
        $animalFamily = \App\Models\AnimalFamily::factory()->create();

        $name = $this->faker->word;
        $description = $this->faker->word;
        $status = (int) $this->faker->boolean();

        $response = $this->post(route('animals.store'), [
            'name' => $name,
            'description' => $description,
            'min_hp' => $this->faker->numberBetween(1, 2048),
            'max_hp' => $this->faker->numberBetween(2048, 4096),
            'min_attack' => $this->faker->numberBetween(1, 200),
            'max_attack' => $this->faker->numberBetween(200, 500),
            'min_defense' => $this->faker->numberBetween(1, 200),
            'max_defense' => $this->faker->numberBetween(200, 500),
            'animal_especie_id' => $animalEspecie->id,
            'animal_family_id' => $animalFamily->id,
            'status' => $status,
        ]);

        $response->assertRedirect(route('animals.list'));
        $response->assertStatus(302);
    }
}
