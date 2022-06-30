<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Question;

class QuestionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_cant_see_anything_withouth_logging() {
        $request = $this->get('/questions');
        $request->assertRedirect('/login');

        $second_request = $this->get('/');
        $second_request->assertRedirect('/login');
    }
    public function test_questions_are_shown_in_index_page() {
        Question::factory(2)->create();
        $question = Question::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user);

        $request = $this->get('/questions');

        $request->assertSeeText($question->question);
    }
    public function test_question_is_show_by_id() {
        $question = Question::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user);

        $request = $this->get("/questions/" . $question->id);
        
        $request->assertSeeText($question->question);
    }
}