@extends('backend.global.master')
@section('title', 'Admin Profile')
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
                    <h4 class="card-title">Admin Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('adminProfileSave', isset($user) ? $user->id : '') }}" method="post">
                        @csrf
                        <div class="basic-form">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control " name="name" value="{{ old('name', isset($user) ? $user->name : '') }}" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control " name="email" value="{{ old('email', isset($user) ? $user->email : '') }}" placeholder="Enter Email" required>
                            </div>
                            <p class="text-danger" id="error">To keep your password as it is please leave this `Old Password` and `New Password` fields empty.</p>
                            <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input type="password" class="form-control " name="old_password" value="" placeholder="Enter Old Password" >
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control " name="password" value="" placeholder="Enter New Password" >
                            </div>
                            <button type="submit" class="btn btn-primary btn-rounded">Submit</button>
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
