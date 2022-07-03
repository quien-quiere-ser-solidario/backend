@extends('layouts.app')

@section('content')
<div class="h-full flex flex-col justify-between items-center gap-5 py-20">
    <h1 class="font-k2d text-3xl font-black uppercase">Preguntas</h1>
    <div class="w-3/4 flex flex-col">
            <a href="{{ route('questions.create') }}" class="w-full text-white text-center font-montserrat font-bold py-2 bg-purple-800 rounded-t-xl border-1 border-black hover:text-white">Añade una pregunta</a>

        <button class="w-full font-bold font-montserrat py-2 bg-orange-500 rounded-b-xl border-1 border-black">Importar perguntas desde fichero (Microsoft Excel)</button>
    </div>
    <div class="w-full h-full overflow-y-auto scroll-smooth my-2 flex flex-col items-center">
    @foreach ($questions as $question)
        <!-- Delete Card -->
        <div id="{{ $question->id }}" class="hidden w-4/5 mb-2 flex">
            <div class="bg-red-400 rounded-3xl py-3 px-4 w-full text-clip">
                <h1 class="font-montserrat font-bold text-white truncate text-ellipsis">¿Seguro que quieres eliminar {{ $question->question }}?</h1>
            </div>
            <div class="flex items-center justify-end px-1 gap-2 bg-white duration-500 w-1/5">
                <button onclick="closeDeleteModal({{ $question->id }})" class="h-12 rounded-full bg-green-400 text-center pointer aspect-square">
                    <i class="fa-solid fa-x text-white font-bold"></i>
                </button>
                <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="h-12 rounded-full bg-red-400 pointer text-center aspect-square">
                        <i class="fa-solid fa-trash-can text-white font-bold"></i>
                    </button>
                </form>
            </div>
        </div>
        <!-- Normal Card -->
        <div id="normal{{ $question->id }}" class="w-4/5 mb-2 group flex">
            <a href="{{ route('questions.show', ['id' => $question->id]) }}" class="w-full">
                <div class="bg-primary rounded-3xl py-3 px-4 w-full text-clip">
                    <h1 class="font-montserrat font-bold text-white truncate text-ellipsis">{{ $question->question }}</h1>
                </div>
                <div class="hidden group-hover:flex items-center justify-center px-1 gap-2 bg-white duration-500 w-1/5">
                    <a href="{{route('questions.edit', ['id' => $question->id])}}" class="h-12 flex justify-center items-center rounded-full bg-[#8153d4] pointer aspect-square">
                        <i class="fa-solid fa-pen text-white font-bold"></i>
                    </a>
                    <button onclick="openDeleteModal({{ $question->id }})" class="h-12 rounded-full bg-[#8153d4] pointer aspect-square">
                        <i class="fa-solid fa-trash-can text-white font-bold"></i>
                    </button>
                </div>
            </a>
        </div>
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