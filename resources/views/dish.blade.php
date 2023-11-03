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
        <h1>{{ $dish->title }}</h1>
        <p>{{ $dish->description }}</p>
    </article>


    <a href="/"> Go Back</a>
</body>

</html>
