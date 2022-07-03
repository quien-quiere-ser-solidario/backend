@extends('layouts.app')

@section('content')
<div class="h-full flex flex-col justify-between items-center gap-5 py-20">
    <h1 class="font-k2d text-3xl font-black uppercase">Edita la pregunta</h1>
    <form method="POST" action="{{ route('questions.update', $question->id) }}" class="flex flex-col w-1/2 h-full justify-between gap-10 bg-tables p-10 rounded-lg">
        @csrf
        @method('PATCH')
        <div class="flex flex-col my-2 gap-3">
            <label for="question" class="font-montserrat text-xl font-extrabold">Pregunta:</label>
            <input id="question" name="question" required placeholder="Pregunta..." value="{{ $question->question }}" class="rounded-lg w-full p-2 mb-6" />
            <label class="font-montserrat text-xl font-extrabold">Respuestas:
                <p class="text-sm font-normal">Marca con un tick la respuesta que sea correcta</p>
            </label>
            
            <div class="flex flex-col gap-2">
                @foreach ($question->answers as $key => $answer)
                    <div class="flex justify-center items-center gap-8">
                        <input id="answer1" name="answers[]" required placeholder="Respuesta 1" value="{{ $answer->answer }}" class="rounded-lg w-full p-2" />
                        <input type="radio" @if($answer->is_correct) checked @endif required name="correct" value="{{ $key }}"  />
                    </div>
                @endforeach
            </div>
        </div>
        <div class="flex justify-between">
            <a href="{{ route('questions.index') }}" class="bg-white text-primary font-montserrat font-bold px-4 py-1 rounded-xl">
                Ir atrás a las Preguntas
            </a>
            <button type="submit" class="bg-primary text-white font-extrabold font-montserrat px-8 py-1 rounded-xl">
                Editar Pregunta
            </button>
        </div>
    </form>
</div>

@endsection