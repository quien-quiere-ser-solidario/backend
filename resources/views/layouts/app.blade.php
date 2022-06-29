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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="grid h-screen w-screen grid-flow-row grid-cols-2">
        @if(Auth::user())
        <div class="h-full w-3/5 bg-blue-600 flex flex-col justify-between py-10">
            <h2 class="text-center text-white font-extrabold text-2xl">Admin Panel</h2>
            <div class="flex flex-col items-center text-white font-bold">
                <a href="{{ route("index") }}">Inicio</a>
                <a href="{{ route('users.index') }}">Usuarios</a>
                <a href="{{ route('questions.index') }}">Preguntas</a>
            </div>
            <span>Logged in as {{ Auth::user()->username }}. 
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </span>
        </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
