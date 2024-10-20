@extends('frontend.global.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-6">
            <div class="welcome-text">
                <h4>Hi, welcome back!</h4>
                <span class="ml-1">Sparkline</span>
            </div>
        </div>
        <div class="col-sm-6 justify-content-sm-end mt-2 mt-sm-0 d-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Charts</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Sparkline</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4">
                            <h4 class="card-title">Line Chart</h4><span id="sparklinedash"></span>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <h4 class="card-title">SITE TRAFFIC</h4>
                            <div class="ico-sparkline">
                                <div id="sparkline8"></div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-4">
                            <h4 class="card-title">SITE TRAFFIC</h4>
                            <div class="ico-sparkline">
                                <div id="sparkline9"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <h4 class="card-title">Bar Chart</h4>
                            <div class="ico-sparkline">
                                <div id="spark-bar"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <h4 class="card-title">Stacked Bar CHART</h4>
                            <div class="ico-sparkline">
                                <div id="StackedBarChart"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 mt-3 mt-md-0">
                            <h4 class="card-title">Tristate charts</h4>
                            <div class="ico-sparkline">
                                <div id="tristate"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-xxl-6 col-md-6">
                            <h4 class="card-title">Composite Line Chart</h4>
                            <div class="ico-sparkline">
                                <div id="sparkline-composite-chart"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-6 col-md-6">
                            <h4 class="card-title">Composite Bar Chart</h4>
                            <div class="ico-sparkline">
                                <div id="composite-bar"></div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-xxl-6 col-md-4 mt-4 mt-xl-0">
                            <h4 class="card-title">Bullet CHART</h4>
                            <div class="ico-sparkline">
                                <div id="bullet-chart"></div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-xxl-4 col-md-4 mt-4 mt-xl-0">
                            <h4 class="card-title">PIE CHART</h4>
                            <div class="ico-sparkline">
                                <div id="sparkline11"></div>
                            </div>
                        </div>
                        <div class="col-xl-1 col-xxl-2 col-md-4 mt-4 mt-xl-0">
                            <h4 class="card-title">Box Plot</h4>
                            <div class="ico-sparkline">
                                <div id="boxplot"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection