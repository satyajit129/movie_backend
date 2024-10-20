@extends('frontend.global.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6 p-md-0">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <span class="ml-1">Toastr</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Advanced</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Toastr</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <!-- Toastr -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Toastr</h4>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-dark mb-2 " id="toastr-success-top-right">Top
                        Right</button>
                    <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-bottom-right">Bottom Right</button>
                    <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-bottom-left">Bottom Left</button>
                    <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-top-left">Top
                        Left</button>
                    <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-top-full-width">Top Full Width</button>
                    <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-bottom-full-width">Bottom Full Width</button>
                    <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-top-center">Top
                        Center</button>
                    <button type="button" class="btn btn-dark mb-2  mr-2" id="toastr-success-bottom-center">Bottom Center</button>
                    <button type="button" class="btn btn-info mb-2  mr-2" id="toastr-info-top-right">Info</button>
                    <button type="button" class="btn btn-warning mb-2  mr-2" id="toastr-warning-top-right">Warning</button>
                    <button type="button" class="btn btn-danger mb-2  mr-2" id="toastr-danger-top-right">Error</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection