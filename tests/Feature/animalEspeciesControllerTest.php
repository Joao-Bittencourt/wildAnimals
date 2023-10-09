<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class animalEspeciesControllerTest extends TestCase
{
  
    public function testListAnimalEspeciesGetRequestSuccess(): void {
        $response = $this->get('/animal-especies');

        $response->assertStatus(200);
    }

    public function testCreateAnimalEspeciesGetRequestSuccess(): void {
        $response = $this->get('/animal-especies/create');

        $response->assertStatus(200);
    }

}
