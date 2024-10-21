@extends('backend.global.master')
@section('title', 'Movie Type List')
@section('custom_css')

    <style>
        .image-preview button {
            cursor: pointer;
            border: none;
            background-color: #ff4d4d;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .image-preview button:hover {
            background-color: #ff0000;
        }
    </style>
@endsection


@section('content')
    <div class="container-fluid">
        @include('backend.global.get_greetings')
        <div class="row">
            <div class="col-xxl-12">
                <div class="card">
                    @include('backend.global.alert')
                    <div class="card-header">
                        <h4 class="card-title">Movie Information</h4>
                        <a href="{{ route('movieList') }}" class="btn btn-primary btn-rounded">Back To List</a>
                    </div>
                    <form action="{{ route('movieSave', isset($movie) ? $movie->id : '') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="name">Movie Name</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', isset($movie) ? $movie->name : '') }}"
                                        placeholder="Enter movie name" required>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="name">Movie Types</label>
                                        <select class="multi-select" name="types[]" multiple="multiple" placeholder="Select movie types">
                                            @forelse ($movie_types as $movie_type)
                                                <option value="{{ $movie_type->id }}"
                                                    @if (isset($movie->movieTypePivot) && in_array($movie_type->id, $movie->movieTypePivot->pluck('type_id')->toArray())) 
                                                        selected 
                                                    @endif>
                                                    {{ $movie_type->name }}
                                                </option>
                                            @empty
                                                <option value="">No data found</option>
                                            @endforelse
                                        </select>                                       
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="name">Movie Description</label>
                                    <textarea class="form-control" rows="4" id="comment" name="description" placeholder="Enter movie description">{{ old('description', isset($movie) ? $movie->description : '') }}</textarea>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="name">Movie Release Date</label>
                                    <input type="text" class="form-control" id="mdate" name="release_date"
                                        placeholder="Enter release date (YYYY-MM-DD)" value="{{ old('release_date', isset($movie) ? $movie->release_date : '') }}">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="movie-duration">Movie Duration</label>
                                    <div class="d-flex">
                                        <input type="number" class="form-control mx-1" name="hours" placeholder="Hour" min="0" max="23"
                                            value="{{ old('hours', isset($movie) ? explode(':', $movie->duration)[0] : 0) }}">
                                        
                                        <span class="mx-1">:</span>
                                        <input type="number" class="form-control mx-1" name="minutes" placeholder="Minute" min="0" max="59"
                                            value="{{ old('minutes', isset($movie) ? explode(':', $movie->duration)[1] : 0) }}">
                                        
                                        <span class="mx-1">:</span>
                                        <input type="number" class="form-control mx-1" name="seconds" placeholder="Second" min="0" max="59"
                                            value="{{ old('seconds', isset($movie) ? explode(':', $movie->duration)[2] : 0) }}">
                                    </div>
                                </div>
                            </div>                            
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="name">Movie Director Name</label>
                                    <input type="text" class="form-control" name="director"
                                        placeholder="Enter director's name" required value="{{ old('director', isset($movie) ? $movie->director : '') }}">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="name">Movie Casts
                                        <span class="badge badge-rounded badge-outline-danger">Casts Names should be
                                            separated by Comma</span>
                                    </label>
                                    <textarea class="form-control" rows="4" name="casting"> {{ old('casting', isset($movie) ? $movie->casting : '') }}</textarea>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="name">Movie Language</label>
                                    <select class="multi-select" name="language[]" multiple="multiple"
                                        placeholder="Select movie languages">
                                        @foreach (\App\Enum\LanguageEnum::getLanguages() as $key => $value)
                                            <option value="{{ $key }}" @if (isset($movie) && in_array($key, json_decode($movie->language))) selected
                                            @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group" style="display: flex; align-items: end;">
                                    <div style="flex-grow: 1; margin-right: 15px;">
                                        <label for="">Thumb Image
                                            <span class="badge badge-rounded badge-outline-danger">Image size should be 300x300 PX</span>
                                        </label>
                                        <input type="file" class="form-control" name="thumb_image" placeholder="Upload thumbnail image" value="{{ old('thumb_image') }}">
                                    </div>
                                    
                                    @if (isset($movie) && $movie->thumb_image)
                                        <div style="margin-left: 20px;">
                                            <img src="{{ asset('uploads/' . $movie->thumb_image) }}" alt="Movie Thumbnail" style="max-width: 100px; max-height: 100px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="">Slider Image
                                        <span class="badge badge-rounded badge-outline-danger">Slider Image size should be 1920x500 PX</span>
                                    </label>
                                    <input type="file" class="form-control" name="slider_image" placeholder="Upload slider image" value="{{ old('slider_image') }}">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="">Trailer Url</label>
                                    <input type="text" class="form-control" name="trailer_url"
                                        placeholder="Enter trailer URL" value="{{ old('trailer_url', isset($movie) ? $movie->trailer_url : '') }}">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="">Movie Download Url</label>
                                    <input type="text" class="form-control" name="download_url"
                                        placeholder="Enter download URL" value="{{ old('download_url', isset($movie) ? $movie->download_url : '') }}">
                                </div>
                            </div>

                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="meta_tag">Meta Tags</label>
                                    <input type="text" class="form-control" name="meta_tag"
                                        placeholder="e.g. action, drama, thriller" value="{{ old('meta_tag', isset($movie) ? $movie->meta_tag : '') }}">
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" rows="3" name="meta_description" placeholder="Enter meta description">{{ old('meta_description', isset($movie) ? $movie->meta_description : '') }}</textarea>
                                </div>
                            </div>
                            <div class="basic-form">
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keywords</label>
                                    <input type="text" class="form-control" name="meta_keyword"
                                        placeholder="e.g. movie, cinema, release" value="{{ old('meta_keyword', isset($movie) ? $movie->meta_keyword : '') }}">
                                </div>
                            </div>

                            <div class="rounded-button">
                                <button type="submit"
                                    class="btn btn-rounded btn-outline-primary pl-4 pr-4">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection

@section('custom_scripts')

@endsection
