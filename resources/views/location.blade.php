@extends('layouts.app')
@section('js')
    <script type="text/javascript" src="{{asset('js/location.js')}}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_aYY-tUX0mckLy2RcmP6LNKfn9E5znMY&v=weekly&libraries=places&callback=initialize"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bPopup/0.11.0/jquery.bpopup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                <form role="form" method="POST" action="">
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
                            <label for="lat">Place</label>
                        <input type="text" class="reg-input-city" placeholder="place" id="city">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div div class="col-lg-0 col-sm-4">
                            
                        </div>
                        <div class="col-lg-12 col-sm-4">
                            <button type="submit" class="btn btn-primary">Add location</button>
                        </div>
                        <div class="col-lg-0 col-sm-4">
                            
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-0 col-sm-4">
                
            </div>
        </div>
        <div class="row">
            <div div class="col-lg-0 col-sm-4">
                
            </div>
            <div class="col-lg-12 col-sm-4" id="mapStore">
                <div id="map-canvas" ></div>
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