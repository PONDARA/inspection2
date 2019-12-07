@extends('layouts.app')
@section('js')
    <script type="text/javascript" src="{{asset('js/location.js')}}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFuKALeALKxCMxXfsakzJxM0giobJooYc&libraries=places&callback=initialize"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bPopup/0.11.0/jquery.bpopup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/location.css')}}">
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
        <div class="row">
            <div class="col-lg-0 col-sm-4">
                
            </div>
            <div class="col-lg-12" >
                <form role="form" method="POST" action="{{route('locationAddMap')}}">
                    @csrf
                    <div class="form-group">
                        <label for="map-search">Search Address </label>
                        <input id="map-search" class="controls" type="text" placeholder="Search Box" size="104" name="location_search" required autofocus>
                    </div>
                    <div class="form-group row col-12">
                        <div class="col-4">
                            <label for="city" style="display: block;">Place</label>
                            <input type="text" class="reg-input-city" id="city" name="location_name" required autofocus>
                        </div>
                        <div class="col-4">
                            <label for="lat" style="display: block;">latitude</label>
                            <input type="text" class="latitude" id="lat" name="latitude">
                        </div>
                        <div class="col-4">
                            <label for="long" style="display: block;">longtitude</label>
                            <input type="text" class="longtitude" id="long" name="longtitude">
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
    <div class="table-responsive" id="adminTable">
            <table class="table align-items-center table-flush">
                 <thead class="thead-light">
                        <tr>
                            <th scope="col">{{ __('Location') }}</th>
                            <th scope="col">{{ __('Lattitud') }}</th>
                            <th scope="col">{{ __('Longtitude') }}</th>
                            <th scope="col"></th>
                        </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                        <tr>
                            <td>
                                {{ $location->location_name }}
                            </td>
                            <td>
                                {{$location->longtitude}}
                            </td>
                            <td> 
                                {{$location->latitude}}
                            </td>
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <form action="{{ (route('deleteLocation',['location_id'=>$location->location_id]))}}" method="post">
                                        @csrf
                                            <a class="dropdown-item" href="{{ (route('editLocation',['location_id'=>$location->location_id]))}}">
                                                {{ __('Edit') }}
                                            </a>
                                            @foreach($availables as $available)
                                            @if($location->location_id == $available->location_id )
                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                {{ __('Delete') }}
                                            </button>
                                            @endif
                                            @endforeach
                                        </form>
                                        </div>
                                    </div>     
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        <?php echo $locations->render(); ?>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush