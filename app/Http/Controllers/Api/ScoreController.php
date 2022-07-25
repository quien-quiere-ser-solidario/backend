<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Score;

class ScoreController extends Controller
{
    public function store(Request $request) {
        $validated_request = $request->validate([
            'user_id' => 'required|integer',
            'score' => 'required|integer|min:0|max:2000'
        ]);

        if($validated_request["user_id"] != Auth::id()) {
            return response('El usuario no concuerda', 402);
        }

        $user = Auth::user();

        $score = [
            'score' => $validated_request['score']
        ];

        try {
            $score = Score::create($score);

            $user->scores()->attach($score);

            return response('Puntuación guardada correctamente');
            
        } catch (\Exception $e) {
            return response('Se ha encontrado un error', 500);
        }
    }
}
