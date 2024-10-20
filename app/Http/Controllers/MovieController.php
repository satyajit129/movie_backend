<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function movieList()
    {
        $movies = Movie::with(['creator', 'updater', 'movieType'])->get();
        return view('backend.pages.movie.list');
    }
    public function movieCreateorUpdate($id = null)
    {
        $movie = $id ? Movie::findOrFail($id) : null;

        if ($movie) {
            return view('backend.pages.movie.create_or_update', compact('movie'));
        }else{
            return view('backend.pages.movie.create_or_update');
        }
    }
}
