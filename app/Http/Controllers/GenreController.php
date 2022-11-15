<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function list (){
        $genres = Genre::get();
        return view('genres.list', ['genres' => $genres]);
    }
}
