<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genres';

    /**
    * The movie that belong to the genre.
    */
   public function movie()
   {
       return $this->belongsToMany(Movie::class, 'movies_genres');
   }
}
