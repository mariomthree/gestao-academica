<?php

namespace Tests\Feature;

use App\Models\User;
use Carbon\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /** 
     * @test 
     */
    public function login_returns_view()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /** 
     * @test 
     */
    public function login_with_valid_email_password()
    {
        $user = User::factory()->create();

        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);

        $response->assertRedirect(route('admin'));
        $this->assertAuthenticatedAs($user);
    }

    /** 
     * @test 
     */
    public function login_with_invalid_email_password()
    {
        $response = $this->post(route('login'), [
            'email' => 'user@example.com',
            'password' => '11))1@@#'
        ]);
        $response->assertRedirect(url('/'));
    }

}
