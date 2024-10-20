<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieType extends Model
{
    protected $guarded = [];
    protected $table = 'movie_types';

    // Relationship to the creator
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship to the updater
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
