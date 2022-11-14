</head>

<body>
<div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <h3 class="mb-0">
                <strong class="d-inline-block mb-2 text-primary">{{ $movies->primaryTitle }}</strong>
              </h3>
              <p>date sortie :{{ $movies->startYear }}</p>
              <p>temps: {{ $movies->runtimeMinutes }}</p>
              <p>Résumer: {{ $movies->plot }}</p>
              <p>La note est de {{ $movies->averageRating }} sur {{ $movies->numVotes }} votes</p>
            
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" alt="" src="{{ $movies->poster }}">
          </div>
</body>

</html>