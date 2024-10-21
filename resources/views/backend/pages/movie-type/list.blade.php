@extends('backend.global.master')
@section('title', 'Movie Types List')
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
                    <h4 class="card-title">Movie Type List</h4>
                    <a href="{{ route('typeCreateorUpdate') }}" class="btn btn-primary btn-rounded">Add New Type</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($movie_types as $movie_type)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $movie_type->name }}</td>
                                    <td>{{ $movie_type->creator->name ?? 'Unknown' }}</td>
                                    <td>{{ $movie_type->updater->name ?? 'Unknown' }}</td>
                                    <td><a class="btn btn-sm btn-outline-info" href="{{ route('typeCreateorUpdate', $movie_type->id) }}"><i class="fa fa-pencil color-muted"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $movie_types->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_scripts')
@endsection