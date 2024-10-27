@extends('backend.global.master')
@section('title', 'Admin Dashboard')
@section('custom_css')
@endsection


@section('content')
<div class="container-fluid">
    @include('backend.global.get_greetings')
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-link text-danger border-danger"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Total Movies</div>
                        <div class="stat-digit">{{ $total_movies }}</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="stat-widget-one card-body">
                    <div class="stat-icon d-inline-block">
                        <i class="ti-user text-primary border-primary"></i>
                    </div>
                    <div class="stat-content d-inline-block">
                        <div class="stat-text">Total User </div>
                        <div class="stat-digit">{{ $total_users }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_scripts')
@endsection