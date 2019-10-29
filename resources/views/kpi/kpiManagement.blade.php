@extends('layouts.app', ['title' => __('User Management')])
@section('js')
    <script type="text/javascript" src="{{asset('js/kpiManagement.js')}}"></script>
@endsection
@section('css')
<style>
    #create-kpi-container{
        margin-bottom: 13px;
        margin-top: 23px;
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
        <div class="row">
            <div class="col">
                @if(\Session::has('error'))
                    <div class="alert alert-danger mb-0" role="alert">{!! \Session::get('error')[0] !!}</div>
                @endif 
            </div>
        </div>

        <div id="create-kpi-container" class="row justify-content-end">
            <div class="col" style="text-align:end;">
                <a href="{{ route('kpi_creation_form') }}">
                    <button class="btn btn-success" type="button">
                        Create KPI  
                    </button>
                </a>
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
                    @foreach ($kpis as $kpi)
                        <tr class="data-container-row">
                            <td>{{ $kpi->title }}</td>
                            <td>{{ $kpi->date }}</td>
                            <td kpi-id="{{ $kpi->id }}" class="kpi-status @if ($kpi->publish == 1) <?php echo 'status-blue' ?>  @else <?php echo 'status' ?> @endif">
                                @if ($kpi->publish == 1) <?php echo 'active' ?> 
                                @else <?php echo 'inactive' ?>
                                @endif
                            </td>
                            <td>{{ $kpi->length }}</td>
                            <td> 
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('kpi_detail', ['kpi_id'=>$kpi->id]) }}">View</a>
                                        @if ($kpi->publish == 1) <a  class="dropdown-item deactivate-btn" href="">Deactivate</a>
                                        @endif
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @csrf
                    {{-- status-blue --}}
                </tbody>
            </table>
        </div>
          
          <!-- Modal -->
          <div class="modal fade" id="deactivate-error-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Invalid</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    </div>

    @include('layouts.footers.auth')

@endsection
