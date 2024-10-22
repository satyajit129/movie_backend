<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Movie;
use App\Models\Type;
use App\Notifications\MovieNotification;
use App\Traits\ImageUploadTrait;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    use ImageUploadTrait;
    public function movieList()
    {
        $movies = Movie::with(['movieCreator', 'movieUpdater'])->paginate(10);
        return view('backend.pages.movie.list', compact('movies'));
    }
    public function movieCreateorUpdate($id = null)
    {
        $movie_types = Type::latest()->get();
        $movie = $id ? Movie::with(['movieTypePivot'])->findOrFail($id) : null;
        if ($movie) {
            return view('backend.pages.movie.create_or_update', compact('movie', 'movie_types'));
        } else {
            return view('backend.pages.movie.create_or_update', compact('movie_types'));
        }
    }
    public function movieSave(Request $request, $id = null)
    {
        try {
            $request->validate([
                'name' => 'required',
                'slug' => 'required',
                'types' => 'required',
                'description' => 'required',
                'release_date' => 'nullable',
                'hours' => 'nullable',
                'minutes' => 'nullable',
                'seconds' => 'nullable',
                'director' => 'required',
                'casting' => 'nullable',
                'language' => 'required',
                'thumb_image' => 'nullable',
                'slider_image' => 'nullable',
                'trailer_url' => 'nullable',
                'download_url' => 'nullable',
                'meta_tag' => 'nullable',
                'meta_description' => 'nullable',
                'meta_keyword' => 'nullable',
            ]);


            $movie = $id ? Movie::findOrFail($id) : new Movie;
            $movie->name = $request->name;
            $movie->slug = $request->slug;
            $movie->description = $request->description;
            $movie->release_date = $request->release_date;
            $movie->duration = sprintf('%02d:%02d:%02d', $request->hours ?? 0, $request->minutes ?? 0, $request->seconds ?? 0);
            $movie->director = $request->director;
            $movie->casting = $request->casting;
            $movie->trailer_url = $request->trailer_url;
            $movie->download_url = $request->download_url;
            $movie->meta_tag = $request->meta_tag;
            $movie->meta_description = $request->meta_description;
            $movie->meta_keyword = $request->meta_keyword;
            // dd('okkkk');
            if ($request->has('language')) {
                $movie->language = json_encode($request->language);
            }
            if ($request->hasFile('thumb_image')) {
                $movie->thumb_image = $this->uploadImage($request->file('thumb_image'), '/uploads/');
            }
            if ($request->hasFile('slider_image')) {
                $movie->slider_image = $this->uploadImage($request->file('slider_image'), '/uploads/');
            }
            if (!$id) {
                $movie->created_by = Auth::id();
            }
            $movie->updated_by = Auth::id();
            $movie->save();
            if ($request->has('types') && is_array($request->types)) {
                $this->storeMovieType($movie, $request->types);
            }
            Auth::user()->notify(new MovieNotification($movie, $id ? true : false));
            return redirect()->route('movieList')->with('success', 'Movie saved successfully.');
        } catch (Throwable $th) {
            // dd($th);
            return redirect()->route('movieCreateorUpdate')->with('error', $th->getMessage());
        }
    }
    private function storeMovieType(Movie $movie, $types)
    {
        $movie->movieType()->attach($types);
    }
    public function generateSlug(Request $request)
    {
        $slug = Str::slug($request->name); // Generate slug from movie name
        return response()->json(['slug' => $slug]);
    }

}
