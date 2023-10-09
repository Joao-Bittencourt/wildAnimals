<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class animalsControllerTest extends TestCase {

    public function testListAnimalGetRequestSuccess(): void {
        $response = $this->get('/animals');

        $response->assertStatus(200);
    }

    public function testCreateAnimalGetRequestSuccess(): void {
        $response = $this->get('/animals/create');

        $response->assertStatus(200);
    }

}
