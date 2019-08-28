@extends('layouts.app')
@section('js')
    <script type="text/javascript" src="{{asset('js/dashboard.js')}}"></script>
@endsection
@section('content')
    @include('layouts.headers.securityStaticHeader')
    
    <div class="container-fluid" style="margin-top: 10px;margin-bottom: 10px">
        <div class="row">
            <div class="col-lg-0 col-sm-4">
                
            </div>
            <div class="col-lg-12 col-sm-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total orders</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-0 col-sm-4">
                
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush