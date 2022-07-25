<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Score extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'scores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'score',
        'username'
    ];

    /**
     * Get the user that has scored
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    static function getCurrentMonthScores() {
        $month = date('m');
        $year = date('Y');
        return Score::orderBy('created_at', 'desc')->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
    }

    static function concatenateScores($scores) {
        $scoreArray = [];

        try {
            foreach ($scores as $key => $score) {
                
                $found = array_key_exists($score["user_id"], $scoreArray);
    
                if ($found !== false) {
                    $index = array_search($score, $scoreArray);
                    $scoreArray[$index]["score"] = intval($scoreArray[$index]["score"]) + intval($score->score);
                    continue;
                }
                array_push($scoreArray, $score);
            }
    
            return $scoreArray;

        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    static function sortScores($scores) {
        usort($scores, function ($a, $b) {
            if ($a["score"] == $b["score"]) return 0;
            return ($b["score"] < $a["score"]) ? -1 : 1;
        });
        return $scores;
    }

}
