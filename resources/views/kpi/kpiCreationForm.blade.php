@extends('layouts.app', ['title' => __('User Management')])
@section('js')
    <script type="text/javascript" src="{{asset('js/kpiManagement.js')}}"></script>
@endsection
@section('css')

    <link rel="stylesheet" href="{{ asset('css/kpiCreationForm.css') }}">
    {{-- <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet"> --}}

@endsection
@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <input type="text" name="title" id="title-input" placeholder="Title">
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <nav>
					<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
						<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
						<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">About</a>
					</div>
				</nav>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                    <tr>
                                        <td>asdijfjfoia jdoisfjisand fnsdifn ianslifnlisadn filns fnasud nfiunsad fnuals</td>
                                        <td>asdijfjfoia jdoisfjisand fnsdifn ianslifnlisadn filns fnasud nfiunsad fnuals</td>
                                        <td class="activate-btn"> 
                                            
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Mark</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Jacob</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="fa" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Larry</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                                    <tr>
                                        <td>asdijfjfoia jdoisfjisand fnsdifn ianslifnlisadn filns fnasud nfiunsad fnuals</td>
                                        <td>asdijfjfoia jdoisfjisand fnsdifn ianslifnlisadn filns fnasud nfiunsad fnuals</td>
                                        <td class="activate-btn"> 
                                            
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Mark</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Jacob</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="fa" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Larry</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
					</div>
					<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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
                                    <tr>
                                        <td>asdijfjfoia jdoisfjisand fnsdifn ianslifnlisadn filns fnasud nfiunsad fnuals</td>
                                        <td>asdijfjfoia jdoisfjisand fnsdifn ianslifnlisadn filns fnasud nfiunsad fnuals</td>
                                        <td class="activate-btn"> 
                                            
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Mark</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Jacob</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="fa" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Larry</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
					</div>
					<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
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
                                    <tr>
                                        <td>asdijfjfoia jdoisfjisand fnsdifn ianslifnlisadn filns fnasud nfiunsad fnuals</td>
                                        <td>asdijfjfoia jdoisfjisand fnsdifn ianslifnlisadn filns fnasud nfiunsad fnuals</td>
                                        <td class="activate-btn"> 
                                            
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Mark</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Jacob</td>
                                        <td class="activate-btn"> 
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="fa" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Larry</td>
                                        <td>
                                            <button type="button" class="btn btn-sm btn-toggle focus" data-toggle="button" aria-pressed="true" autocomplete="off">
                                                <div class="handle"></div>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
					</div>
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
                            <tr>
                                <td>asdijfjfoia jdoisfjisand fnsdifn ianslifnlisadn filns fnasud nfiunsad fnuals</td>
                                <td>9</td>
                                <td>remove</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>8</td>
                                <td>remove</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>9</td>
                                <td >remove</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>4</td>
                                <td >remove</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>6</td>
                                <td >remove</td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>9</td>
                                <td >remove</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                butt
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
