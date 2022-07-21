<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function getQuestions() {
        $questions = Question::inRandomOrder()->limit(20)->get();

        foreach($questions as $question) {
            $answers = $question->answers()->inRandomOrder()->get();


            $question["answers"] = $answers;
        }

        return response()->json($questions);
    }
}
