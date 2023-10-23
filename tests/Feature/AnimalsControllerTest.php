<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class AnimalsControllerTest extends TestCase {

    use RefreshDatabase;

    public function testListAnimalGetRequestSuccess(): void {
        $response = $this->get('/animals');

        $response->assertViewIs('animals.list');
        $response->assertStatus(200);
    }

    public function testCreateAnimalGetRequestSuccess(): void {

        $loggedUser = User::factory()->create();

        $response = $this
                ->actingAs($loggedUser)
                ->get(route('animals.create'));

        $response->assertViewIs('animals.create');
        $response->assertStatus(200);
    }

}
