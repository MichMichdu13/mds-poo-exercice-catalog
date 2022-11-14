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
        $page = 1;
        if(request('order_by')==null){
            $filtre = 'id';
        }else{
            $filtre = request('order_by');
        }
        
        if (request('page')!=null){
            $page = intval(request('page'));
            $movies = Movie::orderBy($filtre, 'DESC')->where('id', '<=', 20*intval(request('page')))->where('id', '>', 20*(intval(request('page'))-1))->get();
        }else{
            $movies = Movie::where('id', '<=', 20)->get();
        }
        
        return view('movies.list', ['movies' => $movies,'page' => $page, 'filtre' => $filtre]);
    }
}
