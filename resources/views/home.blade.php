@extends('layouts')

@section('title', 'Jela svijeta')


<select id="per_page">
    <option value="5" @if ($meta->itemsPerPage == '5') selected @endif>5</option>
    <option value="10" @if ($meta->itemsPerPage == '10') selected @endif>10</option>
    <option value="15" @if ($meta->itemsPerPage == '15') selected @endif>15</option>
    <option value="20" @if ($meta->itemsPerPage == '20') selected @endif>20</option>
    <option value="25" @if ($meta->itemsPerPage == '25') selected @endif>25</option>
</select>


@section('content')
    @foreach ($data as $dish)
        <h1><a href="{{ route('dish.show', ['id' => $dish->id]) }}">{{ $dish->title }}</a></h1>
        <p>{{ $dish->description }}</p>
    @endforeach

    <a href="{{ $links->prev }}">
        <button {{ $links->prev ? '' : 'disabled' }}>Nazad</button>
    </a>

    <a href="{{ $links->next }}">
        <button {{ $links->next ? '' : 'disabled' }}>Naprijed</button>
    </a>

    <script src="{{ asset('js/home.functions.js') }}"></script>
@endsection
