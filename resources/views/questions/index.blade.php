@extends('layouts.app')

@section('content')
<div>
    @foreach ($questions as $question)
        <div>
            <h1>{{ $question->question }}
        </div>
    @endforeach
</div>

@endsection