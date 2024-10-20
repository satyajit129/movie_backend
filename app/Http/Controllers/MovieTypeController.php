<?php

namespace App\Http\Controllers;

use App\Models\MovieType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class MovieTypeController extends Controller
{
    public function movieTypeList()
    {
        $movie_types = MovieType::with(['creator', 'updater'])->get();
        return view('backend.pages.movie-type.list' , compact('movie_types'));
    }

    public function movieTypeCreateorUpdate($id = null)
    {
        $movie_type = $id ? MovieType::findOrFail($id) : null;

        if ($movie_type) {
            return view('backend.pages.movie-type.create_or_update', compact('movie_type'));
        }else{
            return view('backend.pages.movie-type.create_or_update');
        }
    }
    public function movieTypeSave(Request $request, $id = null)
    {
        try {
            $request->validate([
                'name' => 'required',
            ], [
                'name.required' => 'Please Enter movie type name, This field is required',
            ]);
            $movieType = $id ? MovieType::findOrFail($id) : new MovieType();
            $movieType->name = $request->name;
            if ($id) {
                $movieType->updated_by = Auth::user()->id;
            } else {
                $movieType->created_by = Auth::user()->id;
                $movieType->updated_by = Auth::user()->id;
            }
            $movieType->save();
            return redirect()->route('movieTypeList')->with('success', $id ? 'Movie type updated successfully' : 'Movie type created successfully');

        } catch (Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}
