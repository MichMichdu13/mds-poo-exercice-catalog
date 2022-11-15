<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function show($id)
    {
        $series = Series::find($id);
        $episodes = Series::find($series->id)->episodes()->orderBy('episodeNumber','ASC')->get();
        $nbSaison = Series::find($series->id)->episodes()->max('seasonNumber'); 
        return view('series.show', ['series' => $series, 'episodes' => $episodes, 'nbSaison' => $nbSaison]);
    }

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

    public function listSaison($id, $season_num){
        $series = Series::find($id);
        $episodes = Series::find($series->id)->episodes()->where('seasonNumber',$season_num)->get();

        return view('series.listSaison', ['episodes' => $episodes,'serie'=> $series, 'season_num' => $season_num]);
    }

    public function showEpisode($id, $season_num, $episode_num){

        $series = Series::find($id);
        $episodes = Series::find($series->id)
            ->episodes()
            ->where('seasonNumber',$season_num)
            ->where('episodeNumber',$episode_num)
            ->get();
        $episodes = $episodes[0];
        return view('series.showEpisode', ['episodes' => $episodes]);
    }
}
