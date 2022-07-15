<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Trivial') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@300;400;500;700;800&family=Montserrat:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="grid h-screen w-screen grid-flow-row grid-cols-3">
        @if(Auth::user())
        @php
            $currentRoute = Route::currentRouteName();
        @endphp
        <div class="h-full w-2/3 bg-blue-600 flex flex-col justify-between py-10">
            <div>
                <img src="https://i.ibb.co/xg6VZY0/Logo.png" class="mx-auto" height="100" width="100" alt="Qui vol ser solidari logo"/>
                <h2 class="text-center text-white font-extrabold text-3xl">Panel de Administración</h2>    
            </div>
            <div class="flex flex-col items-center text-white font-bold gap-4">
                <a href="{{ route("index") }}" @class(["text-xl font-bold uppercase text-white duration-150 hover:scale-110", "border-b-8 border-orange-600" => $currentRoute == 'index',])>Inicio</a>
                <a href="{{ route('users.index') }}" @class(["text-xl font-bold uppercase text-white duration-150 hover:scale-110", "border-b-8 border-orange-600" => str_contains($currentRoute, 'users'),])>Usuarios</a>
                <a href="{{ route('questions.index') }}" @class(["text-xl font-bold uppercase text-white duration-150 hover:scale-110", "border-b-8 border-orange-600" => str_contains($currentRoute, 'questions'),])>Preguntas</a>
            </div>
            <div class="flex flex-col items-center justify-center gap-2 text-white">
                <p>Has iniciado sesión como: <span class="font-bold">{{ Auth::user()->username }}.</span></p>
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button type="submit" class="text-primary font-bold bg-white rounded-full px-3 py-1">Desconectarse</button>
                </form>
            </div>
        </div>
        @endif
        <div class="col-span-2 h-full w-full overflow-hidden">
        @yield('content')
        </div>
    </div>

    <script src="https://kit.fontawesome.com/176919793f.js" crossorigin="anonymous"></script>
</body>
</html>
