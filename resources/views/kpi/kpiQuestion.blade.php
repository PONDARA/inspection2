@extends('layouts.app')
@section('js')
    <script type="text/javascript" src="{{asset('js/dashboard.js')}}"></script>
    <script src="{{ asset('js/kpiQuestion.js') }}"></script>
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
    <div class="col-12">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#inspection" role="tab" aria-controls="home" aria-selected="true">Add Question</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#kpi" role="tab" aria-controls="profile" aria-selected="false">All Question</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="inspection" role="tabpanel" aria-labelledby="home-tab">
                  <div class="container-fluid mt-5 mb-5">
                    <div class="row">
                        <div class="col-xl-12 order-xl-1">
                            <div class="card bg-secondary shadow">
                                <div class="card-header bg-white border-0">
                                    <div class="row align-items-center">
                                        <div class="col-12">
                                            <h3 class="mb-0">{{ __('Add more questiion') }}</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="{{ route('questionStore') }}" autocomplete="off">
                                        @csrf
                                        <div class="form-group">
                                            <label for="question">Question</label>
                                            <input type="text" class="form-control" id="question" aria-describedby="emailHelp" placeholder="Add question" required autofocus name="question">
                                        </div>
                                        <div class="form-group">
                                            <label for="objective">Obiective</label>
                                            <input type="text" class="form-control" id="objective" aria-describedby="emailHelp" placeholder="Add objective" name="objective">
                                        </div>
                                        <label class="form-control-label" for="location">{{ __('Question Category') }}</label>
                                        <div class="input-group input-group-alternative mb-3">
                                            <select class="form-control" name="question_cat_id" id="question_cat">
                                            @foreach($questionCategories as $question_category)
                                                <option value="{{$question_category->id}}">{{$question_category->name}}</option>
                                             @endforeach   
                                            </select>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success mt-4">{{ __('Save Question') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="kpi" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container-fluid main-container">
                    <div class="row mt-4">
                        <div class="col-12">
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
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush