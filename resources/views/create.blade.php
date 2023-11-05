@extends('layouts')

@section('title', 'Dodaj jelo')

@section('content')
    <form method="POST" action="{{ route('meal.store') }}">
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
            <h2>Namirnice:</h2>
            <div class="ingredients">
                <div class="ingredient">
                    <input type="text" name="ingredient_1" id="ingredient_1" placeholder="Naziv namirnice">
                </div>

                <!-- Dodajte koliko god želite polja za unos namirnica -->
            </div>
            <button type="button" id="addIngredient">Dodaj namirnicu</button>
        </div>



        <div>
            <button class="submit">Dodaj jelo</button>
        </div>

    </form>
    <script src="{{ asset('js/create.functions.js') }}"></script>
@endsection
