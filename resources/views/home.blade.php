@extends('layouts')

@section('title', 'Jela svijeta')


<select id="per_page">
    <option value="5" @if ($per_page == '5') selected @endif>5</option>
    <option value="10" @if ($per_page == '10') selected @endif>10</option>
    <option value="15" @if ($per_page == '15') selected @endif>15</option>
    <option value="20" @if ($per_page == '20') selected @endif>20</option>
    <option value="25" @if ($per_page == '25') selected @endif>25</option>
</select>


@section('content')
    @foreach ($dishes as $dish)
        <h1><a href="{{ route('dish.show', ['id' => $dish->id]) }}">{{ $dish->title }}</a></h1>
        <p>{{ $dish->description }}</p>
    @endforeach

    <script src="{{ asset('js/home.functions.js') }}"></script>
@endsection
