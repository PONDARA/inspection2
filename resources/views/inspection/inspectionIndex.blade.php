@extends('layouts.app', ['title' => __('User Management')])
@section('js')
    <script type="text/javascript" src="{{asset('js/inspectionIndex.js')}}"></script>
@endsection
@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid" style="margin-top: 10px;margin-bottom: 10px">
        <div class="row">
            <input class="date form-control" type="text" id="datepicker">
        </div>
    </div>
    <div class="container-fluid" style="margin-top: 10px;margin-bottom: 10px">
        <div class="row">
            <div class="col-lg-0 col-sm-4">
                
            </div>
            <div class="col-lg-12 col-sm-4" >
                <table class="table rounded text-center ">
                    <tr class="table-success">
                        <th scope="col" style="font-size: 20px;color: black">Name</th>
                        <th scope="col" style="font-size: 20px;color: black">Eamil</th>
                        <th scope="col" style="font-size: 20px;color: black">Cration date</th>
                        <th scope="col" style="font-size: 20px">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v" style="color: black"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <button type="button" class="dropdown-item" onclick="deleletInspectiolist()">
                                        {{ __('Delete') }}
                                    </button>
                                </div>
                            </div>
                        </th>
                    </tr>
                </table>
            </div>
            <div class="col-lg-0 col-sm-4">
                
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
@endsection