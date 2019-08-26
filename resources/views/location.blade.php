@extends('layouts.app')
@section('js')
    <script type="text/javascript" src="{{asset('js/location.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLtKY4xtB6GyETi9oAwSADuaqt68-RYIc&libraries=places&callback=initialize"></script>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/location.css')}}">
@endsection
@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid" style="margin-top: 10px;margin-bottom: 10px">
        <div class="row">
            <div class="col-lg-0 col-sm-4">
                
            </div>
            <div class="col-lg-12 col-sm-4" >
                <form role="form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <label for="map-search">Address</label>
                        <input id="map-search" class="controls" type="text" placeholder="Search Box" size="104">
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="lat">lat</label>
                        <input type="text" class="latitude" id="lat">
                        </div>
                        <div class="col-4">
                            <label for="lat">long</label>
                        <input type="text" class="longitude" id="long">
                        </div>
                        <div class="col-4">
                            <label for="lat">city</label>
                        <input type="text" class="reg-input-city" placeholder="City" id="city">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-0 col-sm-4">
                
            </div>
            <!-- map......................... -->
            <div class="container-fluid text-center">
                <div class="col-lg-0 col-sm-4">
                
                </div>
                <div class="col-lg-12 col-sm-4 tex-center" >
                    <div id="map-canvas"></div>
                </div>
                <div class="col-lg-0 col-sm-4">
                    
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush