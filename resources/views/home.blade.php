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
    <option value="with-category" @if (app('request')->input('category_id') == 'with-category') selected @endif> Sa Kategorijom </option>
    <option value="no-category"@if (app('request')->input('category_id') == 'no-category') selected @endif> Bez Kategorije </option>
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
    <div>
        @foreach ($data as $meal)
            <div>
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
