<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class QuestionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_questions_are_shown_in_index_page() {
        Question::factory(2)->create();
        $question = Question::factory()->create();
        $admin = User::factory()->create(['is_admin' => 1]);
        Auth::login($admin);
        $auth_admin = Auth::user();

        $this->actingAs($auth_admin);

        $request = $this->get('/questions');

        $request->assertSeeText($question->question);
    }
    public function test_question_is_show_by_id() {
        $question = Question::factory()->create();
        $admin = User::factory()->create(['is_admin' => 1]);
        Auth::login($admin);
        $auth_admin = Auth::user();

        $this->actingAs($auth_admin);

        $request = $this->get("/questions/" . $question->id);
        
        $request->assertSeeText($question->question);
    }
    public function test_questions_edit_form_view_works() {
        $question = Question::factory()->create();
        $admin = User::factory()->create(['is_admin' => 1]);
        Auth::login($admin);
        $auth_admin = Auth::user();

        $this->actingAs($auth_admin);

        $request = $this->get("/questions/edit/" . $question->id);

        $request->assertStatus(200);
        $request->assertViewIs('questions.edit');

    }
    public function test_question_can_be_updated() {
        $question = Question::factory()->create();
        $admin = User::factory()->create(['is_admin' => 1]);
        Auth::login($admin);
        $auth_admin = Auth::user();

        $editedQuestion = [
            'question' => 'Edited question',
            'answers' => []
        ];

        $this->actingAs($auth_admin);

        $request = $this->patch('/questions/update/' . $question->id, $editedQuestion);

        $request->assertRedirect('/questions');

        $newQuestion = Question::find($question->id);

        $this->assertEquals($newQuestion->question, $editedQuestion["question"]);
    }
    public function test_create_form_view_works() {
        $admin = User::factory()->create(['is_admin' => 1]);
        Auth::login($admin);
        $auth_admin = Auth::user();

        $this->actingAs($auth_admin);

        $request = $this->get("/questions/create/");

        $request->assertStatus(200);
        $request->assertViewIs('questions.create');
    }
    public function test_question_can_be_stored() {
        $admin = User::factory()->create(['is_admin' => 1]);
        Auth::login($admin);
        $auth_admin = Auth::user();

        $newQuestion = [
            'question' => 'New question',
            'answers' => []
        ];

        $this->actingAs($auth_admin);

        $request = $this->post('/questions/store/', $newQuestion);

        $request->assertRedirect('/questions');

        $question = Question::all()[0];

        $this->assertEquals($question->question, $newQuestion["question"]);
    }
    public function test_questions_can_be_deleted() {
        $question = Question::factory()->create();
        $admin = User::factory()->create(['is_admin' => 1]);
        Auth::login($admin);
        $auth_admin = Auth::user();

        $this->actingAs($auth_admin);

        $request = $this->delete('/questions/destroy/' . $question->id);

        $request->assertRedirect('/questions');

        $this->assertCount(0, Question::all());
    }
}