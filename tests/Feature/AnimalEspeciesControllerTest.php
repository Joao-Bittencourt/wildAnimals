<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnimalEspeciesControllerTest extends TestCase {
    
    use RefreshDatabase,
        WithFaker;

    public function testListAnimalEspeciesGetRequestSuccess(): void {
        $response = $this->get('/animal-especies');

        $response->assertViewIs('animalEspecies.list');
        $response->assertStatus(200);
    }

    public function testCreateAnimalEspeciesGetRequestSuccess(): void {
        $response = $this->get('/animal-especies/create');

        $response->assertViewIs('animalEspecies.create');
        $response->assertStatus(200);
    }

    public function testStoreAnimalEspeciesPostRequestSuccess(): void {

        $name = $this->faker->word;
        $description = $this->faker->word;
        $status = (int) $this->faker->boolean();
                
        $response = $this->post(route('animalEspecies.store'), [
            'name' => $name,
            'description' => $description,
            'status' => $status,
        ]);

        $response->assertRedirect(route('animalEspecies.list'));
        $response->assertStatus(302);
    }

}
