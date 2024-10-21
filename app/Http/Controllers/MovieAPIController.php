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
            // Generate full URLs for the thumbnail and slider images
            $movie->thumb_image_url = $movie->thumb_image ? asset('uploads/' . $movie->thumb_image) : null;
            $movie->slider_image_url = $movie->slider_image ? asset('uploads/' . $movie->slider_image) : null;
            return $movie;
        });
        return response()->json($movies);
    }

    public function movieDetails($id)
{
    // Fetch the movie with related data
    $movie = Movie::with(['movieCreator', 'movieUpdater'])->findOrFail($id);

    // Generate URLs for the images
    $movie->thumb_image_url = $movie->thumb_image ? asset('uploads/' . $movie->thumb_image) : null;
    $movie->slider_image_url = $movie->slider_image ? asset('uploads/' . $movie->slider_image) : null;

    // Get the type ids related to the movie
    $typeid = $movie->movieTypePivot->pluck('type_id');

    // Fetch type names based on the type ids
    $typeNames = Type::whereIn('id', $typeid)->pluck('name')->toArray(); // Convert to array

    $movie->type_names = $typeNames;

    // Prepare the response data
    return response()->json([
        'movie' => $movie, 
    ]);
}


}
