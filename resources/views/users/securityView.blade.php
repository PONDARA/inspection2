@extends('layouts.app')
@section('js')
    <script type="text/javascript" src="{{asset('js/dashboard.js')}}"></script>
@endsection
@section('content')
    @include('layouts.headers.securityViewHeader')

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
    <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#inspection" role="tab" aria-controls="home" aria-selected="true">Inpection</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#kpi" role="tab" aria-controls="profile" aria-selected="false">KPI</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="inspection" role="tabpanel" aria-labelledby="home-tab">
                  <div class="container-fluid" style="margin-top: 10px;margin-bottom: 10px">
                    @for($i=0; $i<$countarray;$i++)
                    <div class="row">
                        <div class="col-lg-0 col-sm-4">
                            
                        </div>
                        <div class="col-lg-12 col-sm-4" >
                            <table class="table rounded text-center ">
                                <tr class="table-success">
                                    <th scope="col" style="font-size: 20px;color: black"><b>Guard: </b>{{$guards[$i]->name}}</th>
                                    <th scope="col" style="font-size: 20px;color: black"><b>Inspector: </b>{{$inspectors[$i]->name}}</th>
                                    <th scope="col" style="font-size: 20px;color: black">{{$guards[$i]->created_at}}</th>
                                    <th scope="col" style="font-size: 20px">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v" style="color: black"></i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{(route('inspectionItem',['inspectionId'=>$guards[$i]->user_inspect_id]))}}">View</a>
                                                <form action="{{ route('inspectionDestroy',['id'=>$guards[$i]->user_inspect_id]) }}" method="post">
                                                    @csrf
                                                    <a class="dropdown-item" href="#">{{ __('Edit') }}</a>
                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                        {{ __('Delete') }}
                                                    </button>
                                                </form> 
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-0 col-sm-4">
                            
                        </div>
                    </div>
                    @endfor
                </div>
                <?php echo $guards->render(); ?>
          </div>
          <div class="tab-pane fade" id="kpi" role="tabpanel" aria-labelledby="profile-tab">
            
          </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush