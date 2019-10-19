@extends('layouts.app', ['title' => __('User Management')])
@section('js')
    <script type="text/javascript" src="{{asset('js/kpiManagement.js')}}"></script>
@endsection
@section('css')

@endsection
@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid" style="margin-top: 10px">
        @foreach ($questions as $q)
            <div class="row align-items-center">
                <div class="col-10">
                    <div id="text">{{ $q->question}}</div>
                </div>
                <div class="col-2">
                    <input type="checkbox" data-toggle="toggle" id="activeKpi" >
                </div>
                <div class="col-12">
                    <hr>
                </div>
            </div>
        @endforeach
    </div>
   
     <div class="container-fluid" style="margin-top: 10px">
        <div class="row text-center">
           <div class="col-12">
                @include('layouts.footers.auth')
           </div>
        </div>
    </div>
@endsection
