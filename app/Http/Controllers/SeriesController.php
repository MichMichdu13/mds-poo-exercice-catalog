<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function list(Request $request)
    {

        $query = Series::query();
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

        $seriesPerPage = 20;
        $page = ($request->has('page')) ? $request->query('page') : 1;
        $query->skip(($page -1) * $seriesPerPage )->take($seriesPerPage);
        $series = $query->get();
        return view('series.list', [
            'series' => $series,
            'page' => $page,
            'filtre' => $filtre,
            'genre' => $genre,
        ]);
    }

    public function random()
    {
        $series = Series::inRandomOrder()->limit(1)->get();
        $serie = $series[0];
        $episodes = Series::find($serie->id)->episodes()->get();
        return view('series.random', ['series' => $serie, 'episodes' => $episodes]);
    }
}
