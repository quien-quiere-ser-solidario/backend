@extends('layouts.app')

@section('content')
<div class="flex flex-col w-full h-full items-center justify-center">
    <h1 class="font-k2d text-3xl font-black uppercase">Pregunta {{ $question->id }}</h1>
    <div class="flex flex-col my-2 gap-3 bg-tables p-10 rounded-lg">
        <label for="question" class="font-montserrat text-xl font-extrabold">Pregunta:</label>
        <input id="question" disabled name="question" required placeholder="Pregunta..." value="{{ $question->question }}" class="rounded-lg w-full p-2 mb-6 text-white bg-[#8153d4] font-bold" />
        <label class="font-montserrat text-xl font-extrabold">Respuestas:
            <p class="text-sm font-normal">La respuesta correcta está marcada con un tick</p>
        </label>
        <div class="flex flex-col gap-2">
            @if(isset($question->answers[0]))
                @foreach ($question->answers as $key => $answer)
                    <div class="flex justify-center items-center gap-8">
                        <input id="answer{{$key+1}}" name="answers[]" required disabled placeholder="Respuesta {{$key + 1}}" value="{{ $answer->answer }}" class="rounded-lg text-white bg-[#8153d4] font-bold w-full p-2" />
                        <input type="radio" @if($answer->is_correct) checked @endif required name="correct" value="{{ $key }}"  />
                    </div>
                @endforeach
            @else
                @for($i = 0; $i < 4; $i++)
                <div class="flex justify-center items-center gap-8">
                        <input id="answer{{$i+1}}" name="answers[]" required disabled placeholder="Respuesta vacía {{$i + 1}}"  class="rounded-lg text-white bg-[#8153d4] font-bold w-full p-2" />
                        <input type="radio" name="correct" value="{{ $i }}"  />
                    </div>
                @endfor
            @endif
        </div>
        <div id="delete" class="hidden flex-col mt-6 gap-4 p-4 bg-white">
            <h3 class="font-k2d text-xl font-bold">Seguro que desea eliminar <quot>{{ $question->question }}</quot></h3>
            <div class="flex justify-between">
                <button onclick="closeDeleteModal()" class="flex justify-center items-center font-montserrat font-extrabold text-white px-4 py-2 rounded-xl bg-green-400 pointer">
                    No
                </button>
                <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="flex justify-center items-center font-montserrat font-extrabold text-white px-4 py-2 rounded-xl bg-red-400 pointer">
                        Sí
                    </button>
                </form>
            </div>
        </div>
        <div id="normal" class="flex justify-between mt-6 gap-8">
            <a href="{{route('questions.index') }}" class="flex justify-center items-center font-montserrat font-extrabold text-white px-4 py-2 rounded-xl bg-primary pointer">
                Volver a Preguntas
            </a>
            <button onclick="openDeleteModal()" class="flex justify-center items-center font-montserrat font-extrabold text-white px-4 py-2 rounded-xl bg-red-400 pointer">
                Eliminar
            </button>
            <a href="{{route('questions.edit', ['id' => $question->id])}}" class="flex justify-center items-center font-montserrat font-extrabold text-white px-4 py-2 rounded-xl bg-[#8153d4] pointer">
                Editar
            </a>
        </div>
    </div>
</div>

<script>
    const openDeleteModal = () => {
        const normalModalClass = document.getElementById('normal').classList;
        const deleteModalClass = document.getElementById('delete').classList;
        normalModalClass.add('hidden');
        normalModalClass.remove('flex');
        deleteModalClass.add('flex');
        deleteModalClass.remove('hidden');
    }
    const closeDeleteModal = () => {
        const normalModalClass = document.getElementById('normal').classList;
        const deleteModalClass = document.getElementById('delete').classList;
        normalModalClass.remove('hidden');
        normalModalClass.add('flex');
        deleteModalClass.remove('flex');
        deleteModalClass.add('hidden');
    }
</script>
@endsection