</head>

<body>
<div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <strong class="d-inline-block mb-2 text-primary">{{ $episodes->primaryTitle }}</strong>
              </h3>
              <p>date sortie :{{ $episodes->startYear }}</p>
              <p>temps: {{ $episodes->runtimeMinutes }}</p>
              <p>Résumer: {{ $episodes->plot }}</p>
              <p>La note est de {{ $episodes->averageRating }} sur {{ $episodes->numVotes }} votes</p>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" alt="" src="{{ $episodes->poster }}">
          </div>
</body>

</html>