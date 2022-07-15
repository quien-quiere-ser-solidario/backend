@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h1 class="text-3xl text-center font-bold underline">Dashboard WIP</h1>
@endsection
