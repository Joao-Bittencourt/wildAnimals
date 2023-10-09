<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class animalFamiliesControllerTest extends TestCase {

    use RefreshDatabase,
        WithFaker;

    public function testListAnimalFamiliesGetRequestSuccess(): void {
        $response = $this->get('/animal-families');

        $response->assertViewIs('animalFamilies.list');
        $response->assertStatus(200);
    }

    public function testCreateAnimalFamiliesGetRequestSuccess(): void {
        $response = $this->get('/animal-families/create');

        $response->assertViewIs('animalFamilies.create');
        $response->assertStatus(200);
    }

    public function testStoreAnimalFamiliesPostRequestSuccess(): void {

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
