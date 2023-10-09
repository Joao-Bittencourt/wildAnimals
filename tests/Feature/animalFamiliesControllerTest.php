<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class animalFamiliesControllerTest extends TestCase {

    public function testListAnimalFamiliesGetRequestSuccess(): void {
        $response = $this->get('/animal-families');

        $response->assertStatus(200);
    }

    public function testCreateAnimalFamiliesGetRequestSuccess(): void {
        $response = $this->get('/animal-families/create');

        $response->assertStatus(200);
    }

}
