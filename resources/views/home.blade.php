@extends('layouts')

@section('title', 'Jela svijeta')

@section('content')
    @foreach ($dishes as $dish)
        <h1><a href="{{ route('dish.show', ['id' => $dish->id]) }}">{{ $dish->title }}</a></h1>
        <p>{{ $dish->description }}</p>
    @endforeach
@endsection
