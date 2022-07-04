<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_users_are_shown_in_index_page() {
        User::factory(2)->create();
        $user = User::factory()->create();
        $admin = User::factory()->create(['is_admin' => 1]);
        Auth::login($admin);
        $auth_admin = Auth::user();

        $this->actingAs($auth_admin);

        $request = $this->get('/users');

        $request->assertSeeText($user->username);
    }
    public function test_user_is_show_by_id() {
        $user = User::factory()->create();
        $admin = User::factory()->create(['is_admin' => 1]);
        Auth::login($admin);
        $auth_admin = Auth::user();

        $this->actingAs($auth_admin);

        $request = $this->get("/users/" . $user->id);
        
        $request->assertSeeText($user->username);
    }
    public function test_users_edit_form_works() {
        $user = User::factory()->create();
        $admin = User::factory()->create(['is_admin' => 1]);
        Auth::login($admin);
        $auth_admin = Auth::user();

        $this->actingAs($auth_admin);

        $request = $this->get("/users/edit/" . $user->id);

        $request->assertStatus(200);
        $request->assertViewIs('users.edit');
    }

    // public function test_user_can_be_updated() {}

    public function test_users_create_form_works() {
        
        $admin = User::factory()->create(['is_admin' => 1]);
        Auth::login($admin);
        $auth_admin = Auth::user();

        $this->actingAs($auth_admin);

        $request = $this->get("/users/create/");

        $request->assertStatus(200);
        $request->assertViewIs('users.create');
    }

    // public function test_user_can_be_stored() {}

    public function test_user_can_be_deleted() {
        $user = User::factory()->create();
        $admin = User::factory()->create(['is_admin' => 1]);
        Auth::login($admin);
        $auth_admin = Auth::user();

        $this->actingAs($auth_admin);

        $request = $this->delete("/users/destroy/" . $user->id);
        $request->assertStatus(302);
        $request->assertRedirect('/users');
    }
}