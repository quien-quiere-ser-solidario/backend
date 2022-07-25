@extends('layouts.app')

@section('content')
<div class="h-full w-full flex flex-col justify-between items-center gap-5 py-20">
    <h1 class="font-k2d text-3xl font-black uppercase">Usuarios</h1>
    <div class="w-full h-full overflow-y-auto scroll-smooth my-2 flex flex-col items-center">
        <table class="w-full table text-white border-separate space-y-6 text-md">
            <thead class="bg-primary text-white sticky top-0">
                <tr class="font-k2d font-black">
                    <th class="p-3">Nombre de usuario</th>
                    <th class="p-3 text-center">E-mail</th>
                    <th class="p-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr id="{{ $user->id }}" class="hidden bg-red-400">
                    <td colspan="2" class="p-3">
                        <div class="flex align-items-center">
                            <h3 class="font-montserrat font-bold text-white">¿Seguro que quiere eliminar al usuario {{ $user->username }}?</h3>
                        </div>
                    </td>
                    <td class="flex bg-white items-center justify-around">
                        <button onclick="closeDeleteModal({{ $user->id }})" class="h-12 rounded-full bg-green-400 text-center pointer aspect-square">
                            <i class="fa-solid fa-x text-white font-bold"></i>
                        </button>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="h-12 rounded-full bg-red-400 pointer text-center aspect-square">
                                <i class="fa-solid fa-trash-can text-white font-bold"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                
                <tr id="normal{{ $user->id }}" class="bg-tables text-black">
                    <td class="p-3">
                        <a href="{{ route('users.show', $user->id) }}" class="w-full h-full">

                            <h3 class="font-montserrat font-bold">{{ $user->username }}</h3>
                        </a>
                    </td>
                    <td class="p-3 font-bold">
                        <a href="{{ route('users.show', $user->id) }}" class="w-full h-full">
                            <h3 class="font-montserrat font-bold">{{ $user->email }}</h3>
                        </a>
                    </td>
                    
                    <td class="flex items-center justify-around p-3">
                        <a href="{{route('users.edit', ['id' => $user->id])}}" class="h-12 flex justify-center items-center rounded-full bg-[#8153d4] pointer aspect-square">
                            <i class="fa-solid fa-pen text-white font-bold"></i>
                        </a>
                        <button onclick="openDeleteModal({{ $user->id }})" class="h-12 rounded-full bg-[#8153d4] pointer aspect-square">
                            <i class="fa-solid fa-trash-can text-white font-bold"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="w-3/5 flex items-center justify-center">
        <a href="{{ route('users.create') }}" class="bg-green-400 text-black font-k2d font-black text-lg py-2 px-5 rounded-xl cursor-pointer">
            Añadir un Nuevo Usuario
        </a>
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