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
                            <table class="table table-bordered table-striped mb-0">
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
                                        <td>    
                                            <section class="model-2">
                                                <div class="checkbox">
                                                    <input type="checkbox"/>
                                                    <label></label>
                                                </div>
                                            </section>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" checked data-toggle="toggle">
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Larry</td>
                                        <td>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" checked data-toggle="toggle">
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Mark</td>
                                        <td>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" checked data-toggle="toggle">
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Jacob</td>
                                        <td>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" checked data-toggle="toggle"> First
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Larry</td>
                                        <td>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" checked data-toggle="toggle"> First
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
					</div>
					<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
					<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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
					<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
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
            </div>
            <div class="col-6">

            </div>
        </div>
    </div>
@endsection
@section('js')
{{-- <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> --}}
@endsection
