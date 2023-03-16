<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\User;

class LoginRegister extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_access_page_login()
    {
        

        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_access_page_register()
    {
    
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_create_user_connecte_then()
    {
    
        $user = User::factory(1)->create()->first();

        $response = $this->actingAs($user)->get('/');
    
        $response->assertStatus(200);
    }

    public function test_delete_last_user()
    {
    
        $user = User::latest()->first();

        $response = $this->actingAs($user)
                         ->get('/');
    
        $response->assertStatus(200);
        $user->delete();
    }
}
