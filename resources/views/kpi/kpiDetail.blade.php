@extends('layouts.app', ['title' => __('User Management')])
@section('js')
<script src="{{ asset('js/kpiDetail.js') }}"></script>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('css/kpiDetail.css') }}">
@endsection
@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid" style="margin-top: 10px">
        <div class="row justify-content-between date-title">
            <div class="col-md-4">
                <label>Title : </label>
                <label for="">{{ $title }}</label>
            </div>
            <div class="col-md-4 right-align">
                <label>Datetime : </label>
                <label for="">{{ $date_time }}</label>
            </div>
        </div>
        <div class="row date-title">
            <div class="col ">
                <label >KPI status : </label>
                <label kpi-id="{{ $kpi_id }}" id="kpi-status" class="@if ($kpi_is_active) status-blue @else status @endif">
                    @if ($kpi_is_active) active @else inactive @endif
                </label>
            </div>
        </div>
        <div class="row" id="table-row">
            <div class="col-6">
                <p class="mb-4">Guard({{ $all_answered_security_count }}/{{ $all_security_count }})</p>
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table table-bordered table-striped mb-0">
                        <thead>
                            <tr>
                                <th scope="col">Profile(Guard)</th>
                                <th scope="col">Guard</th>
                                <th scope="col">Inspector</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($all_security as $item)
                            <tr class="data-container-row">
                                <td> <img src="/storage/securityGuard/{{ $item->profile_img }}" width="40" class="rounded" alt="Cinque Terre"> </td>
                                <td>{{ $item->name }}</td>
                                <td>@if ($item->is_answered) {{ $item->inspector_name }}
                                    @else ------
                                    @endif
                                </td>
                                <td class="@if ($item->is_answered) status-blue @else status @endif" >
                                    @if ($item->is_answered) done
                                    @else not done
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                            {{-- status-blue --}}
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <div class="container-fluid" id="right-container">
                    <div class="row justify-content-between mb-2">
                        <div class="col-md-4">
                            <p>Question({{ $question_count }})</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table table-bordered table-striped mb-0">
                                    <thead>
                                        <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col">Objective</th>
                                        <th scope="col">Max Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kpi_questions as $item)
                                            <tr class="data-container-row">
                                                <td>{{ $item->question }}</td>
                                                <td>{{ $item->objective }}</td>
                                                <td>{{ $item->pivot->max_score }}</td>
                                            </tr>
                                        @endforeach
                                    @csrf
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($kpi_is_active)
            <div class="row justify-content-end">
                <div class="col-4" style="text-align:end;">
                    <button id="deactivate-btn" type="button" class="btn btn-danger">Decativate</button>
                </div>
            </div>
        @endif

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
   
     <div class="container-fluid" style="margin-top: 10px">
        <div class="row text-center">
           <div class="col-12">
                @include('layouts.footers.auth')
           </div>
        </div>
    </div>
@endsection
