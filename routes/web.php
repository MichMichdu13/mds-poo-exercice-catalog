<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SeriesController;
use App\Models\Movie;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $movies = Movie::inRandomOrder()->whereNotNull('poster')->limit(12)->get();

    return view('home', ['movies' => $movies]);
});

Route::get('/movie/{id}', [MovieController::class,'show'])->name('randomMovie');
Route::get('/movies', [MovieController::class,'list'])->name('listMovie');
Route::get('/movies/random', [MovieController::class,'random'])->name('randomMovie');

Route::get('/genres/list',[GenreController::class,'list'])->name('listGenre');

Route::get('/series/random', [SeriesController::class,'random'])->name('randomSerie');
Route::get('/series/{id}', [SeriesController::class,'show'])->name('showSerie');
Route::get('/series', [SeriesController::class,'list'])->name('listSerie');