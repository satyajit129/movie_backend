@extends('backend.global.master')
@section('title', 'Users List')
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
                    <h4 class="card-title">Users List</h4>
                    <a href="{{ route('adminUserCreateorUpdate') }}" class="btn btn-primary btn-rounded">Add New User</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered verticle-middle table-responsive-sm" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->role == 1)
                                        <span class="badge badge-pill badge-success">Admin</span>
                                        @else
                                        <span class="badge badge-pill badge-success">General User</span>
                                        @endif
                                    </td>
                                    <td><a href="{{ route('adminUserCreateorUpdate', $user->id) }}" class="btn btn-sm btn-outline-info" ><i class="fa fa-pencil color-muted"></i></a></td>
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