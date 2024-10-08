<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testListGetRequestSuccess(): void
    {
        $response = $this
            ->actingAs($this->userAdmin)
            ->get(route('users.list'));

        $response->assertViewIs('users.list');
        $response->assertStatus(200);
    }

    public function testProfileGetRequestSuccess(): void
    {
        $response = $this
            ->actingAs($this->userAdmin)
            ->get(route('users.profile', ['user' => $this->userAdmin]));

        $response->assertViewIs('users.profile');
        $response->assertStatus(200);
    }

    public function testRegisterGetRequestSuccess(): void
    {
        $response = $this->get(route('users.register'));

        $response->assertViewIs('users.register');
        $response->assertStatus(200);
    }

    public function testLoginGetRequestSuccess(): void
    {
        $response = $this->get(route('users.login'));

        $response->assertViewIs('users.login');
        $response->assertStatus(200);
    }

    public function testStorePostRequestSuccess(): void
    {
        $name = $this->faker->word;
        $email = $this->faker->email();

        $response = $this->post(route('users.store'), [
            'name' => $name,
            'nick_name' => $name,
            'email' => $email,
            'password' => $email,
            'password_confirmation' => $email,
        ]);

        $response->assertRedirect(route('playerAnimals.list'));
        $response->assertStatus(302);
    }

    public function testAuthenticatePostRequestSuccess(): void
    {
        $response = $this->post(route('users.authenticate'), [
            'email' => $this->userAdmin->email,
            'password' => 'password',
        ]);

        $response->assertRedirect(route('playerAnimals.list'));
        $response->assertStatus(302);
    }

    public function testAuthenticatePostRequestError(): void
    {
        $response = $this->post(route('users.authenticate'), [
            'email' => 'invalid@email.com',
            'password' => 'invalid_password',
        ]);

        //        $response->assertRedirect(route('users.login'));
        $response->assertSessionHasErrors('email');
        $response->assertStatus(302);
    }

    public function testLogoutGetRequestSuccess(): void
    {
        $response = $this->get(route('users.logout'));

        $response->assertRedirect(route('users.login'));
        $response->assertStatus(302);
    }
}
