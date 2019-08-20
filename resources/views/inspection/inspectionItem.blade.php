@extends('layouts.app', ['title' => __('User Management')])
@section('js')
    <script type="text/javascript" src="{{asset('js/inspectionItem.js')}}"></script>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/inspectionItem.css')}}">
@endsection
@section('content')
    @include('layouts.headers.inspectionHeader')
    <div class="container-fluid" style="margin-top: 10px">
        <div class="row text-center">
            <div class="col-lg-4 ">
                <img src="storage/logo.png" id="inspectionItemImg">
            </div>
            <div class="col-lg-4" >
               <img src="storage/logo.png" id="inspectionItemImg">
            </div>
            <div class="col-lg-4 ">
               <img src="storage/logo.png" id="inspectionItemImg">
            </div>
        </div>
        <div class="row text-center">
            <div class="col-lg-2">
                
            </div>
            <div class="col-lg-4 " >
               <img src="storage/logo.png" id="inspectionItemImg">
            </div>
            <div class="col-lg-4">
                <img src="storage/logo.png" id="inspectionItemImg">
            </div>
            <div class="col-lg-2">
                
            </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top: 10px">
        <div class="row text-center">
           <div class="col-12">
           		<p class="text-dark">
           			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
           			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
           			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
           			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
           			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
           			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
           		</p>
           </div>
        </div>
    </div>
    <div class="container-fluid" style="margin-top: 10px">
        <div class="row text-center">
           <div class="col-12">
           		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
				  Delete record
      				</button>
      				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      				  <div class="modal-dialog" role="document">
      				    <div class="modal-content">
      				     	<div class="modal-body">
      				       		Are u sure want to delele this record?
      				     	</div>
      				      	<div>
      				        	<button type="button" class="btn btn-primary" data-dismiss="modal">Cancle</button>
      				        	<a class="btn btn-danger btn-danger" href="#">Delete</a>
      				      	</div>
      				    </div>
      				  </div>
      				</div>
           </div>
        </div>
    </div>
     <div class="container-fluid" style="margin-top: 10px">
        <div class="row text-center">
           <div class="col-12">
           		@include('layouts.footers.auth')
           </div>
        </div>
    </div>
@endsection
