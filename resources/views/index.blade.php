@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h1 class="text-3xl font-bold underline">Hola! Tailwind Instalado!</h1>
@endsection
