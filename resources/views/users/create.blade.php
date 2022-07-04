@extends('layouts.app')

@section('content')

<div class="h-full flex flex-col justify-between items-center gap-5 py-20">
    <h1 class="font-k2d text-3xl font-black uppercase">Crear Usuario</h1>
    <form method="POST" action="{{ route('users.store') }}" class="flex flex-col w-1/2 h-full justify-between gap-10 bg-tables p-10 rounded-lg">
        @csrf
        <div class="flex flex-col my-2 gap-3">
            <label for="username" class="font-montserrat text-xl font-extrabold">Nombre de usuario:</label>
            <input id="username" name="username" required placeholder="Nombre de usuario..." class="rounded-lg text-lg w-full p-2 mb-6" />
            <label for="username" class="font-montserrat text-xl font-extrabold">Correo electrónico:</label>
            <input id="username" name="username" required placeholder="Correo electrónico..." class="rounded-lg text-lg w-full p-2 mb-6" />
        </div>
    </form>
</div>

@endsection