<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('updated_at', 'desc')->get();
        
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string|unique:questions',
            'answers' => 'required|array|size:4',
            'correct' => 'required|numeric|min:0|max:3'
        ]);

        $question = Question::create([
            'question' => $data['question']
        ]);

        foreach ($data['answers'] as $key => $answer) {
            $answer = [
                'answer' => $answer,
                'is_correct' => 0
            ];
            if ($key === intval($data['correct'])) {
                $answer["is_correct"] = 1;
            }
            $question->answers()->create($answer);
        }

        return redirect()->route('questions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view("questions.show", compact("question"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);

        return view('questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'question' => 'required|string',
            'answers' => 'required|array|size:4',
            'correct' => 'required|numeric|min:0|max:3'
        ]);
        $question = Question::find($id);

        $question->update([
            'question' => $data["question"]
        ]);

        
        foreach ($data['answers'] as $key => $answer) {
            
            $answer = [
                'answer' => $answer,
                'is_correct' => 0
            ];

            if ($key === intval($data['correct'])) {
                $answer["is_correct"] = 1;
            }

            if (!isset($question->answers[$key])) {
                $question->answers()->create($answer);
                continue;
            }

            $question->answers[$key]->update($answer);
        }

        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            Question::destroy($id);

            return redirect()->route('questions.index');
            
        } catch(\Exception $e) {

            $error = $e->getMessage();

            return redirect()->view('errors.index', compact('error'));

        }
    }
}
