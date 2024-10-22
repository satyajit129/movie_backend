@extends('backend.global.master')
@section('title', 'Movie Type List')
@section('custom_css')
@endsection


@section('content')
<div class="container-fluid">
    @include('backend.global.get_greetings')
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                @include('backend.global.alert')
                <div class="card-header">
                    <h4 class="card-title">Movie Type</h4>
                    <a href="{{ route('typeList') }}" class="btn btn-primary btn-rounded">Back To List</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('typeSave', isset($movie_type) ? $movie_type->id : '') }}" method="POST">
                        @csrf
                        <div class="basic-form">
                            <div class="form-group">
                                <label for="name">Type Name</label>
                                <input type="text" class="form-control " name="name" value=" @if (isset($movie_type)) {{ $movie_type->name }}@endif"placeholder="Enter Movie Type" required>
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
