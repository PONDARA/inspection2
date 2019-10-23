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
                                            @foreach($question_categories as $question_category)
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
            
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush