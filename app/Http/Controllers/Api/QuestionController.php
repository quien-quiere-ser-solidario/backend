<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function getQuestions() {
        $questions = Question::getQuestionsForGame();

        return response()->json($questions);
    }
}
