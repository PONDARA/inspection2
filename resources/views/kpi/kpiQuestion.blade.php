@extends('layouts.app')
@section('js')
    <script type="text/javascript" src="{{asset('js/dashboard.js')}}"></script>
    <script src="{{ asset('js/kpiQuestion.js') }}"></script>

@endsection
@section('css')
    <style>
        .questionInput{
            display: inline-block;
            margin-top: 10px;
            width: 94%;
        }

        .labelRemoveQuestion{
            display: inline-block;
            margin-left: 10px;
            font-size: 13px;
            color: red;
            cursor: pointer;

        }

        .labelRemoveQuestion:hover{
            text-decoration: underline;
        }
    </style>
@endsection
@section('content')
    @include('layouts.headers.cards')
    <div id="questionNumberField" class="container" style="margin-top:50px;">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
                <div>
                    <input type="number" class="form-control" id="inputNumberOfQuestion" placeholder="Enter the number of questions">
                </div>
                <div style="text-align:center;margin-top:10px">
                    <button class="btn btn-primary" id="submitNumOfQBtn">Generate</button>
                </div>
            </div>
        </div>
    </div>
    <div id="questionDataContainer" style="display:none;padding-left:40px;padding-right:40px;margin-bottom:40px;margin-top:40px;">
        @csrf
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush