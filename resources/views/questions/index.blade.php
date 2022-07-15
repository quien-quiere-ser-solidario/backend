@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center justify-between h-full gap-5 py-20">
    <h1 class="text-3xl font-black uppercase font-k2d">Preguntas</h1>
    <div class="flex flex-col w-3/4">
            <a href="{{ route('questions.create') }}" class="w-full py-2 font-bold text-center text-white bg-purple-800 border-black font-montserrat rounded-t-xl border-1 hover:text-white">Añade una pregunta</a>

        <button class="w-full py-2 font-bold bg-orange-500 border-black font-montserrat rounded-b-xl border-1">Importar perguntas desde fichero (Microsoft Excel)</button>
    </div>
    <div class="flex flex-col items-center w-full h-full my-2 overflow-y-auto scroll-smooth">
    @foreach ($questions as $question)
        <!-- Delete Card -->
        <div id="{{ $question->id }}" class="flex hidden w-4/5 mb-2">
            <div class="w-full px-4 py-8 bg-red-400 rounded-3xl text-clip">
                <h1 class="font-bold text-white truncate font-montserrat text-ellipsis">¿Seguro que quieres eliminar {{ $question->question }}?</h1>
            </div>
            <div class="flex items-center justify-end w-1/5 gap-2 px-1 bg-white">
                <button onclick="closeDeleteModal({{ $question->id }})" class="h-12 text-center bg-green-400 rounded-full pointer aspect-square">
                    <i class="font-bold text-white fa-solid fa-x"></i>
                </button>
                <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="h-12 text-center bg-red-400 rounded-full pointer aspect-square">
                        <i class="font-bold text-white fa-solid fa-trash-can"></i>
                    </button>
                </form>
            </div>
        </div>
        <!-- Normal Card -->
        <div id="normal{{ $question->id }}" class="flex w-4/5 mb-2 group">
            <a href="{{ route('questions.show', ['id' => $question->id]) }}" class="w-full">
                <div class="w-full px-4 py-8 bg-primary rounded-3xl text-clip group-hover:duration-500">
                    <h1 class="font-bold text-white group-hover:truncate font-montserrat text-ellipsis">{{ $question->question }}</h1>
                </div>
                <div class="flex items-center justify-center hidden w-1/5 gap-2 px-1 bg-white group-hover:flex group-hover:duration-500">
                    <a href="{{route('questions.edit', ['id' => $question->id])}}" class="h-12 flex justify-center items-center rounded-full bg-[#8153d4] pointer aspect-square">
                        <i class="font-bold text-white fa-solid fa-pen"></i>
                    </a>
                    <button onclick="openDeleteModal({{ $question->id }})" class="h-12 rounded-full bg-[#8153d4] pointer aspect-square">
                        <i class="font-bold text-white fa-solid fa-trash-can"></i>
                    </button>
                </div>
            </a>
        </div>
        {{-- <div class="relative w-4/5 h-full px-5 group">
          <div class="absolute left-0 z-10 flex justify-start w-full h-12 px-5 py-3 bg-black group-hover:w-4/5 group-hover:duration-500 rounded-3xl">
            <h1 class="font-bold text-white truncate font-montserrat text-ellipsis">{{ $question->question }}</h1>
          </div>
          <div class="absolute left-0 z-0 flex items-center justify-end w-full h-12 gap-4 pr-6 bg-white rounded-3xl">
            <a href="{{route('questions.edit', ['id' => $question->id])}}" class="h-12 flex justify-center items-center rounded-full bg-[#8153d4] pointer aspect-square">
                <i class="font-bold text-white fa-solid fa-pen"></i>
            </a>
            <button onclick="openDeleteModal({{ $question->id }})" class="h-12 rounded-full bg-[#8153d4] pointer aspect-square">
                <i class="font-bold text-white fa-solid fa-trash-can"></i>
            </button>
          </div>
        </div> --}}
    @endforeach
    </div>
</div>

<script>
    const openDeleteModal = (id) => {
        const normalModalName = "normal" + id.toString();
        const normalModal = document.getElementById(normalModalName);
        const deleteModal = document.getElementById(id);
        deleteModal.classList.remove('hidden');
        normalModal.classList.add('hidden');
    }
    const closeDeleteModal = (id) => {
        const normalModalName = "normal" + id.toString();
        const normalModal = document.getElementById(normalModalName);
        const deleteModal = document.getElementById(id);
        normalModal.classList.remove('hidden');
        deleteModal.classList.add('hidden');
    }
</script>

@endsection