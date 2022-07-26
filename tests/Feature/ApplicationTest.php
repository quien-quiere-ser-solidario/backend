<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class ApplicationTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_forbidden_response_as_normal_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/');

        $response->assertStatus(403);
    }
    public function test_cant_see_anything_withouth_logging() {
        $request = $this->get('/questions');
        $request->assertRedirect('/login');

        $second_request = $this->get('/');
        $second_request->assertRedirect('/login');
    }
    public function test_user_cant_login_to_dashboard() {
        $nonAuth_user = User::factory()->create();
        Auth::login($nonAuth_user);
        $user = Auth::user();
        $this->actingAs($user);
        $request = $this->get('/');
        $request->assertStatus(403);
    }
}
