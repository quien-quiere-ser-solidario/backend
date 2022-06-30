@extends('layouts.app')

@section('content')
<div>
@foreach ($users as $user)
<p>{{$user->username}}</p>
@endforeach
</div>
@endsection