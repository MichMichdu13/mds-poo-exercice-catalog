</head>

<body>
<div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <strong class="d-inline-block mb-2 text-primary">{{ $series->primaryTitle }}</strong>
              </h3>
              <p>date sortie :{{ $series->startYear }}</p>
              <p>temps: {{ $series->runtimeMinutes }}</p>
              <p>Résumer: {{ $series->plot }}</p>
              <p>La note est de {{ $series->averageRating }} sur {{ $series->numVotes }} votes</p>
              <p>nb Episode: {{ count($episodes) }}</p>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" alt="" src="{{ $series->poster }}"><br>
            @for ($i = 1; $i <= $nbSaison; $i++)
                <a href="/series/{{ $series->id }}/season/{{ $i }}">Saison {{ $i }}</a><br><br>
                @foreach($episodes as $episode)
                    @if($episode->seasonNumber === $i)
                        <a href="/series/{{ $series->id }}/season/{{ $i }}/episode/{{ $episode->episodeNumber }}">Episode {{ $episode->episodeNumber }}</a><br>
                    @endif
                @endforeach
            @endfor
          </div>
</body>

</html>