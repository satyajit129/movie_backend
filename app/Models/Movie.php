<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];
    protected $table = 'movies';


    public function movieCreator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function movieUpdater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function movieType()
    {
        return $this->belongsToMany(Type::class, 'movie_type', 'movie_id', 'type_id');
    }

    public function movieTypePivot()
    {
        return $this->hasMany(MovieType::class, 'movie_id', 'id');
    }

}
