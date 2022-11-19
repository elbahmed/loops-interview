<?php

namespace Tests\Feature;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone_number' => '8783448457',
            'password' => 'password',
            'password_confirmation' => 'password',
            'package_id' => 1,
        ]);

        $response->assertStatus(200);
    }

    public function test_new_users_can_login()
    {
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();

        $response = $this->get('/dashboard');
        $response->assertStatus(200);
    }

    public function test_new_users_can_logout()
    {
        $response = $this->get('/logout');
        $response->assertStatus(302);
    }
}
