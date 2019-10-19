@extends('layouts.app')
@section('js')
    <script type="text/javascript" src="{{asset('js/kpiItem.js')}}"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
@section('content')
    @include('layouts.headers.cards')

    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="container-fluid" style="margin-top: 10px;margin-bottom: 10px">
        <div class="row" style="margin-top: 10px">
            <div class="col-2">
                Question
            </div>
            <div class="col-8">
                <div class="progress" style="height: 20px">
                  <div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="6" aria-valuemin="0" aria-valuemax="10">60%</div>
                </div>
            </div>
            <div class="col-2">
                6/10
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush