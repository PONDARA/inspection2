@extends('layouts.app', ['title' => __('User Management')])
@section('js')
    <script type="text/javascript" src="{{asset('js/kpiManagement.js')}}"></script>
    <script src="{{ asset('js/kpiCreationForm.js') }} "></script>
@endsection
@section('css')

    <link rel="stylesheet" href="{{ asset('css/kpiCreationForm.css') }}">
    {{-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> --}}

@endsection
@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid main-container">
        <div class="row">
            <div class="col">
                <div id="error-message" class="alert alert-danger" style="display:none"  role="alert">
                    <ul style="margin-bottom:0"></ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <input class="form-control" type="text" name="title" id="title-input" placeholder="Title">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-6">
                <nav>
					<div id="cate-title" class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						{{-- <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a> --}}
                    @foreach ($questionsWithCate as $item)
                        <a class="nav-item nav-link @if($loop->index == 0)<?php echo 'active' ?> @endif" id="nav-{{ $item['cate_title'] }}-tab" data-toggle="tab" href="#nav-{{ $item['cate_title'] }}" role="tab" aria-controls="nav-home" aria-selected="true">{{ $item['cate_title'] }}</a>
                    @endforeach
                    </div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    @foreach ($questionsWithCate as $item)
                        <div class="tab-pane fade @if($loop->index == 0)<?php echo 'active show' ?> @endif" id="nav-{{ $item['cate_title'] }}" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <table class="table table-bordered table-striped mb-0 all-question-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Question</th>
                                            <th scope="col">Objective</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($item as $question)
                                            @if (count($item) <= $loop->index+1)
                                                @break
                                            @endif
                                            <tr>
                                                <td>{{ $question->question }}</td>
                                                <td>{{ $question->objective }}</td>
                                                <td class="activate-btn"> 
                                                    <button type="button" q-id="{{ $question->id }}-q" class="my-activate-btn btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="false" autocomplete="off">
                                                        <div class="handle"></div>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                    
				</div>
            </div>
            <div class="col-6">
                <p>Selected Questions</p>
                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table id="selected-question-table" class="table table-bordered table-striped mb-0 all-question-table">
                        <thead>
                            <tr>
                                <th scope="col">Question</th>
                                <th scope="col">Max Score</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            {{-- place for each row of selected question --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-3 justify-content-center" style="text-align:center;">
                <button type="button" id="submit-kpi-btn" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
    @csrf
    <!-- Modal -->
    <div class="modal fade" id="max-score-form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enter a max score</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <input type="text" class="form-control" id="max-score-input"/>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="save_max_score_btn" class="btn btn-primary">Enter</button>
        </div>
        </div>
    </div>
    </div>
@endsection
