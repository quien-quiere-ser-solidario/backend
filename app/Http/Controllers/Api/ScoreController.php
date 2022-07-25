<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Score;

class ScoreController extends Controller
{
    public function store(Request $request) {
        $validated_request = $request->validate([
            'score' => 'required|integer|min:0|max:2000'
        ]);

        if(!Auth::user()) {
            return response('No hay usuario identificado', 402);
        }

        $user = Auth::user();

        $score = [
            'score' => $validated_request['score'],
            'user_id' => $user->id,
            'username' => $user->username
        ];

        try {
            
            $user->scores()->create($score);

            return response('Puntuación guardada correctamente');

        } catch (\Exception $e) {
            return response('Se ha encontrado un error: ' . $e->getMessage(), 500);
        }
    }
    public function index() {

        if(!Auth::user()) {
            return response('No hay usuario identificado', 402);
        }

        try {

            $month = date('m');
            $year = date('Y');

            $scores = Score::orderBy('created_at', 'desc')->whereYear('created_at', $year)->whereMonth('created_at', $month)->get();
    
            return response()->json($scores);

        } catch(\Exception $e) {
            return response('Se ha encontrado un error: ' . $e->getMessage(), 500);
        }
    }
}
