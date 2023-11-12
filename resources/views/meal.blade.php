<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>My Blog</title>
</head>

<body>
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
</body>

</html>
