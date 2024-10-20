@extends('backend.global.master')
@section('title', 'Movie Types List')
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
    <!-- row -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('backend.global.alert')
                <div class="card-header">
                    <h4 class="card-title">Movie Type List</h4>
                    <a href="{{ route('movieTypeCreateorUpdate') }}" class="btn btn-primary btn-rounded">Add New Type</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2"  style="width:100%">
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
                                    <td><a href="{{ route('movieTypeCreateorUpdate', $movie_type->id) }}">Edit</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_scripts')
@endsection