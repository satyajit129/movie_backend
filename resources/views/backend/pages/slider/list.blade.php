@extends('backend.global.master')
@section('title', 'Slider List')
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