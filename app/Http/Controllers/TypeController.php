<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Notifications\MovieTypeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Throwable;

class TypeController extends Controller
{
    public function typeList()
    {
        $movie_types = Type::with(['creator', 'updater'])->latest()->paginate(10);
        return view('backend.pages.movie-type.list', compact('movie_types'));
    }

    public function typeCreateorUpdate($id = null)
    {
        $movie_type = $id ? Type::findOrFail($id) : null;

        if ($movie_type) {
            return view('backend.pages.movie-type.create_or_update', compact('movie_type'));
        } else {
            return view('backend.pages.movie-type.create_or_update');
        }
    }
    public function typeSave(Request $request, $id = null)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => [
                    'required',
                    Rule::unique('types')->ignore($id),
                ],
            ], [
                'name.required' => 'Please enter the movie type name. This field is required.',
                'name.unique' => 'The movie type name must be unique. This is already taken.',
            ]);

            // Create or update the movie type
            $movieType = $id ? Type::findOrFail($id) : new Type();
            $movieType->name = $request->name;

            if ($id) {
                $movieType->updated_by = Auth::user()->id;
            } else {
                $movieType->created_by = Auth::user()->id;
                $movieType->updated_by = Auth::user()->id;
            }

            $movieType->save();

            // Send notification
            $notificationMessage = $id ? 'Movie type updated successfully' : 'Movie type created successfully';
            Auth::user()->notify(new MovieTypeNotification($movieType, $id ? true : false));

            return redirect()->route('typeList')->with('success', $notificationMessage);

        } catch (Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

}
