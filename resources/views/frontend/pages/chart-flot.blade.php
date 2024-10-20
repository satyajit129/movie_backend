@extends('frontend.global.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <span class="ml-1">Flot Chart</span>
            </div>
        </div>
        <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Charts</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Flot</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->


    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bar Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="flotBar1" class="flot-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Bar Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="flotBar2" class="flot-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Line Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="flotLine1" class="flot-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Line Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="flotLine2" class="flot-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Line Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="flotLine3" class="flot-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Area Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="flotArea1" class="flot-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Area Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="flotArea2" class="flot-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Realtime Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="flotRealtime1" class="flot-chart"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Realtime Chart</h4>
                        </div>
                        <div class="card-body">
                            <div id="flotRealtime2" class="flot-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection