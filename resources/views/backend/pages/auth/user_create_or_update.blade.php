@extends('backend.global.master')
@section('title', 'User')
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
                    <h4 class="card-title">User Information</h4>
                    <a href="{{ route('adminUserList') }}" class="btn btn-primary btn-rounded">Back To List</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('adminUserSave', isset($user) ? $user->id : '') }}" method="POST">
                        @csrf
                        <div class="basic-form">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control " name="name" value=" @if (isset($user)) {{ $user->name }}@endif"placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control " name="email" value=" @if (isset($user)) {{ $user->email }}@endif"placeholder="Enter Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control " name="password" value="" placeholder="Enter Password" >
                            </div>
                            <div class="form-group">
                                <label for="role">User Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option selected disabled>Select User Role</option>
                                    <option value="1" @if (isset($user) && $user->role == '1') selected @endif>Admin</option>
                                    <option value="2" @if (isset($user) && $user->role == '2') selected @endif>General User</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Save</button>
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
