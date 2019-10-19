@extends('layouts.app', ['title' => __('User Management')])
@section('js')
    <script type="text/javascript" src="{{asset('js/kpiManagement.js')}}"></script>
@endsection
@section('css')
<style>
    #create-kpi-container{
        margin-bottom: 25px;
        margin-top: 40px;
    }

    .middle-row {
        background: red;
        height: 10px;
    }

    .data-container-row{
        box-shadow: 2px 12px 8px -8px rgba(0,0,0,.25);
    }

    table > thead{
        background: #5F71E4;
        height: 58px;
        border-radius: 3px;

    }

    .table thead tr th {
        color: white;
        vertical-align: middle;
        font-weight: bold;
    }

    .table th, .table td{
        text-align: center;
    }

    .table th:nth-last-child(1),.table td:nth-last-child(1){
        text-align: end;
    }

    .status {
        color: red;
    }

    .status-blue{
        color: #5F71E4;
    }

</style>
@endsection
@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid" style="margin-top: 10px">
        <div id="create-kpi-container" class="row justify-content-end">
            <div class="col" style="text-align:end;">
                <button class="btn btn-success" type="button">
                    Create KPI
                </button>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col"># of Question</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="data-container-row">
                    <td>Mark</td>
                    <td>Mark</td>
                    <td class="status">disable</td>
                    <td>@mdo</td>
                    <td> 
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="#">View</a>
                                <a class="dropdown-item" href="#">Activate</a>
                            </div>
                        </div>
                    </td>
                    </tr>
                    <tr class="middle-row"></tr>
                    <tr class="data-container-row">
                    <td>Mark</td>
                    <td>Jacob</td>
                    <td class="status-blue">active</td>
                    <td>@fat</td>
                    <td> 
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="#">View</a>
                                <a class="dropdown-item" href="#">Deactivate</a>
                            </div>
                        </div>
                    </td>
                    </tr>
                    <tr class="middle-row"></tr>
                    <tr class="data-container-row">
                    <td>Mark</td>
                    <td>Larry</td>
                    <td class="status">disable</td>
                    <td>@twitter</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="#">View</a>
                                <a class="dropdown-item" href="#">Activate</a>
                            </div>
                        </div>
                    </td>
                    </tr>
                </tbody>
            </table>
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
