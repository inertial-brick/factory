@extends('layouts')

@section('title', 'Jela svijeta')


<select id="per_page">
    <option value="5" @if ($meta->itemsPerPage == '5') selected @endif>5</option>
    <option value="10" @if ($meta->itemsPerPage == '10') selected @endif>10</option>
    <option value="15" @if ($meta->itemsPerPage == '15') selected @endif>15</option>
    <option value="20" @if ($meta->itemsPerPage == '20') selected @endif>20</option>
    <option value="25" @if ($meta->itemsPerPage == '25') selected @endif>25</option>
</select>

<select id="category">
    <option disabled selected value> -- Odaberite Kategoriju -- </option>
    @foreach ($categories as $category)
        {
        <option value="{{ $category->id }}" @if (app('request')->input('category_id') == $category->id) selected @endif>
            {{ $category->title }}
        </option>
        }
    @endforeach
</select>

<button id="clear-category">Očisti kategoriju</button>

@section('content')
    <div id="mealsContainer">
        @foreach ($data as $meal)
            <div class="meal" data-category="{{ $meal->category->title ?: 'Uncategorized' }}">
                <h1><a href="{{ route('meal.show', ['id' => $meal->id]) }}">{{ $meal->title }}</a></h1>
                <p>{{ $meal->description }}</p>
            </div>
        @endforeach
    </div>

    <a href="{{ $links->prev }}">
        <button {{ $links->prev ? '' : 'disabled' }}>Nazad</button>
    </a>

    <a href="{{ $links->next }}">
        <button {{ $links->next ? '' : 'disabled' }}>Naprijed</button>
    </a>

    <script src="{{ asset('js/home.functions.js') }}"></script>
@endsection
