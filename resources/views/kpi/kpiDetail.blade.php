@extends('layouts.app', ['title' => __('User Management')])
@section('js')
    <script type="text/javascript" src="{{asset('js/kpiManagement.js')}}"></script>
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
                <label for="">Checking</label>
            </div>
            <div class="col-md-4 right-align">
                <label>Date : </label>
                <label for="">2019-07-29</label>
            </div>
        </div>
        <div class="row" id="table-row">
            <div class="col-md-5">
                <p class="mb-4">Guard(30/50)</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Profile(Guard)</th>
                            <th scope="col">Name</th>
                            <th scope="col">Inspector</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="data-container-row">
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>disable</td>
                            <td class="status">not done</td>
                        </tr>
                        <tr class="middle-row"></tr>
                            <tr class="data-container-row">
                            <td>Mark</td>
                            <td>Jacob</td>
                            <td>active</td>
                            <td class="status-blue">done</td>
                        </tr>
                        <tr class="middle-row"></tr>
                        <tr class="data-container-row">
                            <td>Mark</td>
                            <td>Larry</td>
                            <td>disable</td>
                            <td class="status">not done</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-7">
                <div class="container-fluid" id="right-container">
                    <div class="row justify-content-between mb-2">
                        <div class="col-md-4">
                            <p>Question(10)</p>
                        </div>
                        <div class="col-md-4 right-align">
                            
                            <button class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" type="button">add question</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="table question-table">
                                <thead>
                                    <tr>
                                        <th scope="col">Question</th>
                                        <th scope="col">Objective</th>
                                        <th scope="col">Max Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="data-container-row">
                                        <td>For those who are under some domain rules in corporate environment</td>
                                        <td>For those who are under some domain rules in corporate environment</td>
                                        <td >4</td>
                                    </tr>
                                    <tr class="middle-row"></tr>
                                        <tr class="data-container-row">
                                        <td>For those who are under some domain rules in corporate environment</td>
                                        <td>For those who are under some domain rules in corporate environment</td>
                                        <td >6</td>
                                    </tr>
                                    <tr class="middle-row"></tr>
                                    <tr class="data-container-row">
                                        <td>For those who are under some domain rules in corporate environment</td>
                                        <td>For those who are under some domain rules in corporate environment</td>
                                        <td>10</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">New question</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label for="question-input" class="col-form-label">Question</label>
                  <input type="text" class="form-control" id="question-input">
                </div>
                <div class="form-group">
                  <label for="objective-text" class="col-form-label">Objective</label>
                  <textarea class="form-control" id="objective-text"></textarea>
                </div>
                <div class="form-group">
                    <label for="num-of-question-input" class="col-form-label"># of Question</label>
                    <input type="number" class="form-control" id="num-of-question-input"/>
                  </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Create</button>
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
@section('js')
<script src="{{ asset('js/kpiDetail.js') }}"></script>

@endsection
