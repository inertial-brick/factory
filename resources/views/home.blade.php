<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Jela svijeta</title>
</head>


<body>
    <div class = "main-title">
        <header>
            <h1>Jela svijeta</h1>
        </header>
    </div>

    <article>
        @foreach ($dishes as $dish)
            <h1><a href="{{ route('dish.show', ['id' => $dish->id]) }}">{{ $dish->title }}</a></h1>
            <p>{{ $dish->description }}</p>
        @endforeach
    </article>
</body>

</html>
