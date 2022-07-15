@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div id="errors" class="rounded-lg mx-auto w-fit bg-red-400 text-white font-montserrat p-3 absolute top-1/2 left-1/2">
        <h3 class="text-lg py-2 font-black">Hay errores con el usuario que intentas agregar:</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="px-8 py-2">{{ $error }}</li>
            @endforeach
        </ul>
        <button onclick="closeModal()" class="border-white border-1 bg-red-400 text-white font-montserrat font-bold mt-3 py-1 px-3 mx-auto">Cerrar</button>
    </div>
@endif
<div class="h-full flex flex-col justify-between items-center gap-5 py-20">
    <h1 class="font-k2d text-3xl font-black uppercase">Crear Usuario</h1>
    
    <form method="POST" action="{{ route('users.store') }}" class="flex flex-col w-1/2 h-full justify-between gap-12 bg-tables p-10 rounded-lg">
        @csrf
        
        <div class="flex flex-col h-full my-2 gap-3">
            <label for="username" class="font-montserrat text-xl font-extrabold">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required placeholder="Nombre de usuario..." class="rounded-lg text-lg w-full p-2 mb-6" />
            <label for="email" class="font-montserrat text-xl font-extrabold">Correo electrónico:</label>
            <input id="email" type="email" name="email" required placeholder="Correo electrónico..." class="rounded-lg text-lg w-full p-2 mb-6" />
            <label for="password" class="font-montserrat text-xl font-extrabold">Contraseña:</label>
            <input id="password" type="password" name="password" required placeholder="Contraseña..." class="rounded-lg text-lg w-full p-2 mb-6" />
            <label for="repeat-password" class="font-montserrat text-xl font-extrabold">Repite la contraseña:</label>
            <input id="repeat-password" type="password" name="repeat-password" required placeholder="Repite la contraseña..." class="rounded-lg text-lg w-full p-2 mb-6" />
            <label for="is_admin" class="font-montserrat text-xl font-extrabold">Es Administrador? <input type="checkbox" name="is_admin" id="is_admin" class="ml-10"></label>
        </div>
        <div class="flex justify-between h-full items-center">
            <a href="{{ route('users.index') }}" class="bg-primary text-white rounded-xl font-montserrat py-2 px-4"><i class="fa-solid fa-arrow-left"></i> Volver a Usuarios</a>
            <button type="submit" class="bg-green-400 rounded-xl font-montserrat font-bold py-2 px-4">Añadir usuario</button>
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