<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Answer;

class Question extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question'
    ];

    /**
     * Get the answers from a question
     */

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    static function getOrderedQuestions() {
        return Question::orderBy('updated_at', 'desc')->get();
    }

    static function validateStoreRequest($request) {
        return $request->validate([
            'question' => 'required|string|unique:questions',
            'answers' => 'required|array|size:4',
            'correct' => 'required|numeric|min:0|max:3'
        ]);
    }
    static function validateUpdateRequest($request) {
        return $request->validate([
            'question' => 'required|string',
            'answers' => 'required|array|size:4',
            'correct' => 'required|numeric|min:0|max:3'
        ]);
    }
    static function storeQuestion($data) {
        return Question::create([
            'question' => $data['question']
        ]);
    }
    static function updateQuestion($data, $id) {
        $question = Question::find($id);

        $question->update([
            'question' => $data["question"]
        ]);
        $question->save();

        return $question;
    }
    static function getQuestionsForGame() {
        $questions = Question::inRandomOrder()->limit(20)->get();

        foreach($questions as $question) {
            $answers = $question->answers()->inRandomOrder()->get();


            $question["answers"] = $answers;
        }

        return $questions;
    }
}
