@extends('backend.global.master')
@section('title', 'Movie List')
@section('custom_css')
@endsection


@section('content')
<div class="container-fluid">
    @include('backend.global.get_greetings')
    <!-- row -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('backend.global.alert')
                <div class="card-header">
                    <h4 class="card-title">Movie List</h4>
                    <a href="{{ route('movieCreateorUpdate') }}" class="btn btn-primary btn-rounded">Add New Movie</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Name</th>
                
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movies as $movie)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('uploads/'. $movie->thumb_image) }}" alt="{{ $movie->thumb_image }}" width="100" ></td>
                                    <td>{{ $movie->name }}</td>
                                    <td>{{ $movie->movieCreator->name ?? 'Unknown' }}</td>
                                    <td>{{ $movie->movieUpdater->name ?? 'Unknown' }}</td>
                                    <td><a class="btn btn-sm btn-outline-info" href="{{ route('movieCreateorUpdate', $movie->id) }}"><i class="fa fa-pencil color-muted"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $movies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_scripts')
@endsection