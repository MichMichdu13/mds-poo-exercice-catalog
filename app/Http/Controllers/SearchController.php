<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    
    public static function search(Request $request) {
        $titleQuery = $request->query('query');
    
        return view('search', [
          'movies' => Movie::where('primaryTitle', 'LIKE', '%'.$titleQuery.'%')->get(),
          'series' => Series::where('primaryTitle', 'LIKE', '%'.$titleQuery.'%')->get(),
          'query' => $titleQuery
        ]);
      }
}
