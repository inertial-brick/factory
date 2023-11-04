@extends('layouts')

@section('title', 'Dodaj jelo')

@section('content')
    <form method="POST" action="{{ route('dish.store') }}">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="7"></textarea>
        </div>

        <div>
            <button class="submit">Dodaj jelo</button>
        </div>
    </form>
@endsection
