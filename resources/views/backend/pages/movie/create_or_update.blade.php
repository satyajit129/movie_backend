@extends('backend.global.master')
@section('title', 'Movie Type List')
@section('custom_css')
@endsection


@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, {{ Auth::user()->name }}</h4>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                @include('backend.global.alert')
                <div class="card-header">
                    <h4 class="card-title">Movie Name</h4>
                    <a href="{{ route('movieList') }}" class="btn btn-primary btn-rounded">Back To List</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('movieTypeSave', isset($movie_type) ? $movie_type->id : '') }}" method="POST">
                        @csrf
                        <div class="basic-form">
                            <div class="form-group">
                                <input type="text" class="form-control " name="name" value="" placeholder="Enter Movie Name" required>
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="form-group">
                                
                            </div>
                        </div>
                        <div class="basic-form">
                            <div class="form-group">
                            <label for="name">Movie Types</label>
                            <select class="multi-select" name="states[]" multiple="multiple">
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="UI">dlf</option>
                            </select>
                            </div>
                        </div>
                        <div class="rounded-button">
                            <button type="submit" class="btn btn-rounded btn-outline-primary pl-4 pr-4">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('custom_scripts')
@endsection
