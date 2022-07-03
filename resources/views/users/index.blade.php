@extends('layouts.app')

@section('content')
<div class="h-full flex flex-col justify-between items-center gap-5 py-20">
    <h1 class="font-k2d text-3xl font-black uppercase">Usuarios</h1>
    <div class="w-full h-full overflow-y-auto scroll-smooth my-2 flex flex-col items-center">
        @foreach ($users as $user)
        <p>{{$user->username}}</p>
        @endforeach
    </div>
</div>
@endsection