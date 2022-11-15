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

    </style>
</head>

<body>
    <div class="container">
        <h1>{{ config('app.name') }}</h1>
        @foreach ($genres as $genre)
            <a href="{{ URL::route('listMovie') }}?genre={{ $genre->label }}">
                {{ $genre->label }}
            </a>
            <br>
        @endforeach
    </div>
</body>

</html>