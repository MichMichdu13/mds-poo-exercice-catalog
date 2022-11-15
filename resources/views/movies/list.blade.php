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
        @if($genre != null)
            <a href="{{ URL::route('listMovie') }}?order_by=id&genre={{ $genre }}">Pas de Flitre</a>
            <a href="{{ URL::route('listMovie') }}?order_by=averageRating&genre={{ $genre }}">Filtre Par Note</a>
            <a href="{{ URL::route('listMovie') }}?order_by=startYear&genre={{ $genre }}">Filtre Par Date</a>
        @else
            <a href="{{ URL::route('listMovie') }}?order_by=id">Pas de Flitre</a>
            <a href="{{ URL::route('listMovie') }}?order_by=averageRating">Filtre Par Note</a>
            <a href="{{ URL::route('listMovie') }}?order_by=startYear">Filtre Par Date</a>
        @endif
        <div class="wrapper">
            @foreach ($movies as $movie)
            <a href="/movie/{{ $movie->id }}">
                <img src="{{ $movie->poster }}" alt="{{ $movie->primaryTitle }}">
            </a>
            <p>{{ $movie->primaryTitle }}</p>
            <p>{{ $movie->averageRating }}</p>
            @endforeach
        </div>

        @if($genre != null)
            @if($filtre == 'id')
                @if ($page != 1)
                    <a href="{{ URL::route('listMovie') }}?page={{ $page-1 }}&genre={{ $genre }}">Page Précedente</a>
                @endif
                <a href="{{ URL::route('listMovie') }}?page={{ $page+1 }}&genre={{ $genre }}">Page Suivante</a>
            @else
                @if ($page != 1)
                    <a href="{{ URL::route('listMovie') }}?page={{ $page-1 }}&order_by={{ $filtre }}&genre={{ $genre }}">Page Précedente</a>
                @endif
                <a href="{{ URL::route('listMovie') }}?page={{ $page+1 }}&order_by={{ $filtre }}&genre={{ $genre }}">Page Suivante</a>
            @endif
        @else
            @if($filtre == 'id')
                @if ($page != 1)
                    <a href="{{ URL::route('listMovie') }}?page={{ $page-1 }}">Page Précedente</a>
                @endif
                <a href="{{ URL::route('listMovie') }}?page={{ $page+1 }}">Page Suivante</a>
            @else
                @if ($page != 1)
                    <a href="{{ URL::route('listMovie') }}?page={{ $page-1 }}&order_by={{ $filtre }}">Page Précedente</a>
                @endif
                <a href="{{ URL::route('listMovie') }}?page={{ $page+1 }}&order_by={{ $filtre }}">Page Suivante</a>
            @endif
        @endif
    </div>
</body>

</html>