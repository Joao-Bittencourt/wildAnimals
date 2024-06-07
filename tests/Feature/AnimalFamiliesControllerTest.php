<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnimalFamiliesControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testListAnimalFamiliesGetRequestSuccess(): void
    {

        $loggedUser = User::factory()->create();

        $response = $this
            ->actingAs($loggedUser)
            ->get(route('animalFamilies.list'));

        $response->assertViewIs('animalFamilies.list');
        $response->assertStatus(200);
    }

    public function testCreateAnimalFamiliesGetRequestSuccess(): void
    {

        $loggedUser = User::factory()->create();

        $response = $this
            ->actingAs($loggedUser)
            ->get(route('animalFamilies.create'));

        $response->assertViewIs('animalFamilies.create');
        $response->assertStatus(200);
    }

    public function testStoreAnimalFamiliesPostRequestSuccess(): void
    {

        $loggedUser = User::factory()->create();
        $this->actingAs($loggedUser);

        $name = $this->faker->word;
        $description = $this->faker->word;
        $status = (int) $this->faker->boolean();

        $response = $this->post(route('animalFamilies.store'), [
            'name' => $name,
            'description' => $description,
            'status' => $status,
        ]);

        $response->assertRedirect(route('animalFamilies.list'));
        $response->assertStatus(302);
    }
}
