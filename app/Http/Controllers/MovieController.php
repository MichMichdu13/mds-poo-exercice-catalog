<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
    public function show ($id){
        $movies = Movie::find($id);
        return view('movies.show', ['movies' => $movies]);
    }

    public function list (){
        $movies = Movie::where('id', '<=', 20)->get();
        return view('movies.list', ['movies' => $movies]);
    }
}
