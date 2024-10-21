<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieType extends Model
{
    protected $table = 'movie_type';
    protected $guarded = [];


    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
    public function types()
    {
        return $this->hasMany(Type::class);
    }
}
