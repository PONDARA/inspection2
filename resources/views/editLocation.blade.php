@extends('layouts.app')
@section('js')
    <script type="text/javascript" src="{{asset('js/editLocation.js')}}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFuKALeALKxCMxXfsakzJxM0giobJooYc&libraries=places&callback=initialize"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bPopup/0.11.0/jquery.bpopup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/editLocation.css')}}">
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
        <div class="row mb-3 col-12 text-center">
           <h1 class="col-12">
               Edit Location
           </h1>
        </div>
        <div class="row">
            <div class="col-lg-0 col-sm-4">
                
            </div>
            <div class="col-lg-12 col-sm-4" >
                @foreach ($locations as $location)
                <form role="form" method="POST" action="{{ (route('editLocationStore',['location_id'=>$location->location_id]))}}">
                    @csrf
                    <div class="form-group">
                        <label for="map-search">Search Address </label>
                        <input id="map-search" class="controls" type="text" placeholder="Search Box" size="104" name="location_search" required autofocus value="{{$location->location_search}}">
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="city">Place</label>
                        <input type="text" class="reg-input-city" id="city" name="location_name" value="{{$location->location_name}}" required autofocus>
                        </div>
                        <div class="col-4">
                            <label for="lat">lat</label>
                        <input type="text" class="latitude" id="lat" name="latitude" value="{{$location->latitude}}">
                        </div>
                        <div class="col-4">
                            <label for="long">long</label>
                        <input type="text" class="longtitude" id="long" name="longtitude" value="{{$location->longtitude}}">
                        </div>
                    </div>
                    <div class="row text-center">
                        <div div class="col-lg-0 col-sm-4">
                            
                        </div>
                        <div class="col-lg-12 col-sm-4">
                            <button type="submit" class="btn btn-primary mb-3">
                            Save this location</button>
                        </div>
                        <div class="col-lg-0 col-sm-4">
                            
                        </div>
                    </div>
                </form>
                @endforeach
            </div>
            <div class="col-lg-0 col-sm-4">
                
            </div>
        </div>
        <div class="row">
            <div div class="col-lg-0 col-sm-4">
                
            </div>
            <div class="col-lg-12 col-sm-4 mb-5" id="mapStore">
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