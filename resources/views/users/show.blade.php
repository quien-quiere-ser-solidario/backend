@extends('layouts.app')

@section('content')
<div class="flex flex-col w-full h-full items-center justify-center">
    <h1 class="font-k2d text-3xl font-black uppercase">Usuario {{ $user->id }}</h1>
    <div class="flex flex-col my-2 gap-3 bg-tables p-10 rounded-lg">
        <label for="username" class="font-montserrat text-xl font-extrabold">Usuario:</label>
        <input id="username" disabled name="username" required placeholder="Usuario..." value="{{ $user->username }}" class="rounded-lg w-full p-2 mb-6 text-white bg-[#8153d4] font-bold" />
        <label for="email" class="font-montserrat text-xl font-extrabold">Correo electrónico:</label>
        <input id="email" disabled name="email" required placeholder="Correo electrónico..." value="{{ $user->email }}" class="rounded-lg w-full p-2 mb-6 text-white bg-[#8153d4] font-bold" />
        <label for="is_admin" class="font-montserrat text-xl font-extrabold">Es Administrador? <input type="checkbox" @if($user->is_admin) checked @endif disabled name="is_admin" id="is_admin" class="ml-10"></label>
        <div id="delete" class="hidden flex-col mt-6 gap-4 p-4 bg-white">
            <h3 class="font-k2d text-xl font-bold">Seguro que desea eliminar <quot>{{ $user->username }}</quot></h3>
            <div class="flex justify-between">
                <button onclick="closeDeleteModal()" class="flex justify-center items-center font-montserrat font-extrabold text-white px-4 py-2 rounded-xl bg-green-400 pointer">
                    No
                </button>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="flex justify-center items-center font-montserrat font-extrabold text-white px-4 py-2 rounded-xl bg-red-400 pointer">
                        Sí
                    </button>
                </form>
            </div>
        </div>
        <div id="normal" class="flex justify-between mt-6 gap-8">
            <a href="{{route('users.index') }}" class="flex justify-center items-center font-montserrat font-extrabold text-white px-4 py-2 rounded-xl bg-primary pointer">
                Volver a Usuarios
            </a>
            <button onclick="openDeleteModal()" class="flex justify-center items-center font-montserrat font-extrabold text-white px-4 py-2 rounded-xl bg-red-400 pointer">
                Eliminar
            </button>
            <a href="{{route('users.edit', ['id' => $user->id])}}" class="flex justify-center items-center font-montserrat font-extrabold text-white px-4 py-2 rounded-xl bg-[#8153d4] pointer">
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