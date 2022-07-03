@extends('layouts.app')

@section('content')
<div class="flex flex-col w-full h-full items-center justify-center">
    <h1 class="font-k2d text-3xl font-black uppercase">Pregunta {{ $question->id }}</h1>
        <div class="flex flex-col my-2 gap-3 bg-tables p-10 rounded-lg">
            <label for="question" class="font-montserrat text-xl font-extrabold">Pregunta:</label>
            <input id="question" disabled name="question" required placeholder="Pregunta..." value="{{ $question->question }}" class="rounded-lg w-full p-2 mb-6 text-white bg-primary font-bold" />
            <label class="font-montserrat text-xl font-extrabold">Respuestas:
                <p class="text-sm font-normal">La respuesta correcta está marcada con un tick</p>
            </label>
            
            <div class="flex flex-col gap-2">
                @foreach ($question->answers as $key => $answer)
                    <div class="flex justify-center items-center gap-8">
                        <input id="answer1" disabled name="answers[]" required placeholder="Respuesta 1" value="{{ $answer->answer }}" class="rounded-lg w-full p-2 text-white bg-primary font-bold" />
                        <input type="checkbox" disabled @if($answer->is_correct) checked @endif required name="correct" value="{{ $key }}" />
                    </div>
                @endforeach
            </div>
        </div>
</div>
@endsection