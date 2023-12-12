@extends('layout')
@section('title', 'Jela svijeta')

@section('content')
    <article>
        <h1>{{ $meal->title }}</h1>
        <p>{{ $meal->description }}</p>
        <h2>Sastojci:</h2>
        <ul>
            @foreach ($ingredients as $ingredient)
                <li>{{ $ingredient->title }}</li>
            @endforeach
        </ul>
    </article>
    <a href='/'>Idi nazad</a>

@endsection

</html>
