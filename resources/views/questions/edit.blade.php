@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div id="errors" class="rounded-lg mx-auto w-fit bg-red-400 text-white font-montserrat p-3 absolute top-1/2 left-1/2">
        <h3 class="text-lg py-2 font-black">Hay errores con la pregunta que intentas editar:</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="px-8 py-2">{{ $error }}</li>
            @endforeach
        </ul>
        <button onclick="closeModal()" class="border-white border-1 bg-red-400 text-white font-montserrat font-bold mt-3 py-1 px-3 mx-auto">Cerrar</button>
    </div>
@endif
<div class="h-full flex flex-col justify-between items-center gap-5 py-20">
    <h1 class="font-k2d text-3xl font-black uppercase">Editar Pregunta {{ $question->id }}</h1>
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
                @if(isset($question->answers[0]))
                    @foreach ($question->answers as $key => $answer)
                        <div class="flex justify-center items-center gap-8">
                            <input id="answer{{$key+1}}" name="answers[]" required placeholder="Respuesta {{$key + 1}}" value="{{ $answer->answer }}" class="rounded-lg w-full p-2" />
                            <input type="radio" @if($answer->is_correct) checked @endif required name="correct" value="{{ $key }}"  />
                        </div>
                    @endforeach
                @else
                    @for ($i = 0; $i < 4; $i++)
                        <div class="flex justify-center items-center gap-8">
                            <input id="answer{{$i+1}}" name="answers[]" required placeholder="Respuesta {{$i + 1}}" class="rounded-lg w-full p-2" />
                            <input type="radio" required name="correct" value="{{ $i }}"  />
                        </div>
                    @endfor
                @endif
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
<script>
    const closeModal = () => {
        const modal = document.getElementById('errors');
        modal.classList.add('hidden');
    }
</script>

@endsection