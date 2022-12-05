<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        .container {
            margin: auto;
            max-width: 900px;
        }

        .wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ config('app.name') }}</h1>
        <a href="/movies">List film</a>/---/
        <a href="/movies/random">Random film</a>/---/
        <a href="/genres/list">List genre</a>/---/
        <a href="/series">List series</a>/---/
        <a href="/series/random">random series</a>
        <br>
        <form action="/search" method="GET">
            <input name='query'>
            <button type="submit">rechercher</button>
        </form>
        <br>


        <div class="wrapper">
            @foreach ($movies as $movie)
            <div>
                <a href="/movie/{{ $movie->id }}">
                    <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
                </a>
            </div>
            @endforeach
            @foreach ($series as $serie)
            <div>
                <a href="/movie/{{ $movie->id }}">
                    <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
                </a>
            </div>
            @endforeach
            @foreach ($movies as $movie)
            <div>
                <a href="/movie/{{ $movie->id }}">
                    <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
