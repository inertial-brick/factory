@extends('layouts.app')

@section('title', 'Jela svijeta')

<select id="per_page">
    <option value="5" @if ($meta->itemsPerPage == 5) selected @endif>5</option>
    <option value="10" @if ($meta->itemsPerPage == 10) selected @endif>10</option>
    <option value="15" @if ($meta->itemsPerPage == 15) selected @endif>15</option>
    <option value="20" @if ($meta->itemsPerPage == 20) selected @endif>20</option>
    <option value="25" @if ($meta->itemsPerPage == 25) selected @endif>25</option>
</select>

<select id="category">
    <option disabled selected value> -- Odaberite Kategoriju -- </option>
    <option value="with-category" @if (app('request')->input('category_id') == 'with-category') selected @endif> Sa Kategorijom </option>
    <option value="no-category" @if (app('request')->input('category_id') == 'no-category') selected @endif> Bez Kategorije </option>
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" @if (app('request')->input('category_id') == $category->id) selected @endif>
            {{ $category->title }}
        </option>
    @endforeach
</select>

<button id="clear-category">Očisti kategoriju</button>

@section('content')
    <div>
        @foreach ($meals as $meal)
            <div>
                <h1><a href="{{ route('meal.show', ['id' => $meal->id]) }}">{{ $meal->title }}</a></h1>
                <p>{{ $meal->description }}</p>

                <p>Category: {{ $meal->category->title }}</p>

                <p>Tags:
                    @foreach ($meal->tags as $tag)
                        {{ $tag->title }}
                    @endforeach
                </p>

                <p>Ingredients:
                    @foreach ($meal->ingredients as $ingredient)
                        {{ $ingredient->title }}
                    @endforeach
                </p>
            </div>
        @endforeach
    </div>

    {{ $meals->links() }}

    <a href="{{ $meals->previousPageUrl() }}">
        <button {{ $meals->onFirstPage() ? 'disabled' : '' }}>Nazad</button>
    </a>

    <a href="{{ $meals->nextPageUrl() }}">
        <button {{ $meals->hasMorePages() ? '' : 'disabled' }}>Naprijed</button>
    </a>

    <script src="{{ asset('js/home.functions.js') }}"></script>
@endsection
