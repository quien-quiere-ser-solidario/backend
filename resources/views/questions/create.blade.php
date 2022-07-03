@extends('layouts.app')

@section('content')
<div class="h-full flex flex-col justify-between items-center gap-5 py-20">
    <h1 class="font-k2d text-3xl font-black uppercase">¡Añade una pregunta!</h1>
    <form method="POST" action="{{ route('questions.store') }}" class="flex flex-col w-1/2 h-full justify-between gap-10 bg-tables p-10 rounded-lg">
        @csrf
        <div class="flex flex-col my-2 gap-3">
            <label for="question" class="font-montserrat text-xl font-extrabold">Pregunta:</label>
            <input id="question" name="question" required placeholder="Pregunta..." class="rounded-lg w-full p-2 mb-6" />
            <label class="font-montserrat text-xl font-extrabold">Respuestas:
                <p class="text-sm font-normal">Marca con un tick la respuesta que sea correcta</p>
            </label>
            
            <div class="flex flex-col gap-2">
                <div class="flex justify-center items-center gap-8">
                    <input id="answer1" name="answers[]" required placeholder="Respuesta 1" class="rounded-lg w-full p-2" />
                    <input type="radio" required name="correct" value="0" />
                </div>
                <div class="flex justify-center items-center gap-8">
                    <input id="answer2" name="answers[]" required placeholder="Respuesta 2" class="rounded-lg w-full p-2" />
                    <input type="radio" required name="correct" value="1" />
                </div>
                <div class="flex justify-center items-center gap-8">
                    <input id="answer3" name="answers[]" required placeholder="Respuesta 3" class="rounded-lg w-full p-2" />
                    <input type="radio" required name="correct" value="2" />
                </div>
                <div class="flex justify-center items-center gap-8">
                    <input id="answer4" name="answers[]" required placeholder="Respuesta 4" class="rounded-lg w-full p-2" />
                    <input type="radio" required name="correct" value="3" />
                </div>
            </div>
        </div>
        <div class="flex justify-between">
            <a href="{{ route('questions.index') }}" class="bg-white text-primary font-montserrat font-bold px-4 py-1 rounded-xl">
                Ir atrás a las Preguntas
            </a>
            <button type="submit" class="bg-primary text-white font-extrabold font-montserrat px-8 py-1 rounded-xl">
                Añadir Pregunta
            </button>
        </div>
    </form>
</div>

@endsection