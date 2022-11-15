<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function show($id)
    {
        $movies = Movie::find($id);
        return view('movies.show', ['movies' => $movies]);
    }

    public function list(Request $request)
    {

        $query = Movie::query();
        $page = 1;
        if (request('order_by') == null) {
            $filtre = 'id';
        }else {
            $filtre = request('order_by');
        }

        $genre = request('genre');
        if ($genre != null) {
            $query->whereHas('genre', function (Builder $queryGenre) {
                $queryGenre->where('label', request('genre'));
               });
        }
        $query->orderBy($filtre, 'ASC');

        $moviesPerPage = 20;
        $pageQuery = ($request->has('page')) ? $request->query('page') : 1;
        $query->skip(($pageQuery -1) * $moviesPerPage )->take($moviesPerPage);
        
        $movies = $query->get();
        return view('movies.list', [
            'movies' => $movies,
            'page' => $page,
            'filtre' => $filtre,
            'genre' => $genre,
        ]);
    }

    public function random()
    {
        $movies = Movie::inRandomOrder()->limit(1)->get();
        $movie = $movies[0];
        return view('movies.random', ['movies' => $movie]);
    }
}
