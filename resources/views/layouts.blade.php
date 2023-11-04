<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    <div class="main-title">
        <header>
            <h1>Jela svijeta</h1>
        </header>
    </div>


    <div class="content">
        @yield('content')
    </div>

    <footer>

    </footer>
    
</body>

</html>
