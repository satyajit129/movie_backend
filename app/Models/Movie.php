<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];
    protected $table = 'movies';


    public function movie_creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function movie_updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function movie_type()
    {
        return $this->hasMany(MovieType::class, 'movie_type_id');
    }

}
