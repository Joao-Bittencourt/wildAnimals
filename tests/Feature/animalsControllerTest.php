<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class animalsControllerTest extends TestCase {

    use RefreshDatabase,
        WithFaker;

    public function testListAnimalGetRequestSuccess(): void {
        $response = $this->get('/animals');

        $response->assertViewIs('animals.list');
        $response->assertStatus(200);
    }

    public function testCreateAnimalGetRequestSuccess(): void {
        $response = $this->get('/animals/create');

        $response->assertViewIs('animals.create');
        $response->assertStatus(200);
    }

}
