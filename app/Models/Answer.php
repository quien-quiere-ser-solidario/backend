<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Question;

class Answer extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'answers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'answer',
        'is_correct',
    ];

    /**
     * Get the question that owns the answer
     */

    public function question() {
        return $this->belongsTo(Question::class);
    }

    static function createOrUpdateAndAttach($answers, $question, $correct) {
        try {
            foreach ($answers as $key => $answer) {
                $answer = [
                  'answer' => $answer,
                  'is_correct' => 0
                ];
            
                if ($key === intval($correct)) {
                  $answer["is_correct"] = 1;
                }
            
                if (isset($question->answers[$key])) {
                    $question->answers[$key]->update($answer);
                    continue;
                }
                
                $question->answers()->create($answer);
            }

        } catch (\Exception $e) {
            dd($e);
        }
    }
}
