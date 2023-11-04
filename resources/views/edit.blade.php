@extends('layouts')

@section('title', 'Ažuriraj jelo')

@section('content')
    <form method="POST" action="{{ route('dish.edit') }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $dish->title }}">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="7" value="{{ $dish->description }}"></textarea>
        </div>

        <div>
            <h2>Namirnice:</h2>
            <div class="ingredients">
                <div class="ingredient">
                    <input type="text" name="ingredient_1" id="ingredient_1" placeholder="Naziv namirnice">
                </div>


            </div>
            <button type="button" id="addIngredient">Dodaj namirnicu</button>
        </div>



        <div>
            <button class="submit">Ažuriraj jelo</button>
        </div>

    </form>
@endsection
