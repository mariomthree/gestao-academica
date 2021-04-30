<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InternshipsControllerTest extends TestCase
{
    /** CL
     * @test
     */
    public function return_index_view_and_get_all_internships()
    {
        $user = User::factory()->create([
            'is_active' => 1
        ]);
        
        $superAdministrator = Role::where('name', 'super_administrator')->first();
        $user->attachRole($superAdministrator);
        
        $response = $this->actingAs($user)->get(route('internships.index'));
        
        $response->assertStatus(200);
        $response->assertViewIs('admin.internships.index');
        $response->assertViewHas('internships');
        $response->dumpHeaders();
        $response->dump();
    }
}
