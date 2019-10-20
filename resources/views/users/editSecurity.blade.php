@extends('layouts.app', ['title' => __('User Management')])
@section('js')
    <script type="text/javascript" src="{{asset('js/createSecurity.js')}}"></script>
@endsection
@section('content')
    @include('users.partials.header', ['title' => __('Add Security')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{(route('user.editSecurityUpdate',['securityId'=>$securityEdits->id]))}}" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-4">{{ __('Security information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{$securityEdits->name}}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('phoneNumber') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-number">{{ __('Phone number') }}</label>
                                    <input type="text" name="phone_number" id="input-number" class="form-control form-control-alternative{{ $errors->has('phoneNumber') ? ' is-invalid' : '' }}" placeholder="{{ __('phoneNumber') }}" value="{{$securityEdits->phone_number}}" required autofocus>

                                    @if ($errors->has('phoneNumber'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phoneNumber') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('location') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="location">{{ __('Location') }}</label>
                                    <div class="input-group input-group-alternative mb-3">
                                        <select class="form-control" name="location" id="location">
                                            @foreach($locations as $location)
                                            <option value="{{$location->location_id}}"{{ $securityEdits->location_id == $location->location_id ? 'selected' : '' }}>{{$location->location_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('location'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('location') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">{{ __('Profile') }}</label>
                                    <div class="input-group input-group-alternative mb-3">
                                       <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="security_profile_img" name="profile_img" value="{{$securityEdits->profile_img}}" value="">
                                            <label class="custom-file-label" for="file">{{$securityEdits->profile_img}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection