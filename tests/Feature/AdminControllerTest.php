<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    /** 
     * @test 
     */
    public function returns_index_view_if_user_is_active()
    {
        $user = User::factory()->create([
            'is_active' => 1
        ]);
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $response = $this->get(route('admin'));
        $response->assertViewIs('admin.home');
    }

    /** 
     * @test 
     */
    public function redirect_to_login_if_user_is_inactive()
    {
        $user = User::factory()->create([
            'is_active' => 0
        ]);
        $response = $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'password'
        ]);
        $response = $this->get(route('admin'));
        $response->assertRedirect('login');
    }
}

