<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Type;
use Illuminate\Http\Request;

class MovieAPIController extends Controller
{
    public function moviesList(Request $request)
    {
        $query = Movie::with(['movieCreator', 'movieUpdater']);
        if ($request->has('trending') && $request->trending === 'true') {
            $query->where('is_trending', true);
        }
        if ($request->has('top_rated') && $request->top_rated === 'true') {
            $query->where('rating', '>=', 4);
        }
        $movies = $query->get()->map(function ($movie) {
            $movie->thumb_image_url = $movie->thumb_image ? asset('uploads/' . $movie->thumb_image) : null;
            $movie->slider_image_url = $movie->slider_image ? asset('uploads/' . $movie->slider_image) : null;
            return $movie;
        });
        return response()->json($movies);
    }

    public function movieDetails($id)
    {
        $movie = Movie::with(['movieCreator', 'movieUpdater', 'movieTypePivot'])->findOrFail($id);
        $movie->thumb_image_url = $movie->thumb_image ? asset('uploads/' . $movie->thumb_image) : null;
        $movie->slider_image_url = $movie->slider_image ? asset('uploads/' . $movie->slider_image) : null;
        $typeid = $movie->movieTypePivot->pluck('type_id');
        $typeNames = Type::whereIn('id', $typeid)->pluck('name')->toArray(); // Convert to array
        $movie->type_names = $typeNames;
        $relatedMovies = Movie::whereHas('movieTypePivot', function ($query) use ($typeid) {
            $query->whereIn('type_id', $typeid);
        })
        ->where('id', '!=', $id)
        ->take(5)
        ->get();
        $relatedMovies->each(function ($relatedMovie) {
            $relatedMovie->thumb_image_url = $relatedMovie->thumb_image ? asset('uploads/' . $relatedMovie->thumb_image) : null;
            $relatedMovie->slider_image_url = $relatedMovie->slider_image ? asset('uploads/' . $relatedMovie->slider_image) : null;
        });
        return response()->json([
            'movie' => $movie,
            'related_movies' => $relatedMovies,
        ]);
    }

}
