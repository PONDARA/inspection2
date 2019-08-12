@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container" style="margin-top: 10px;margin-bottom: 10px">
        <div class="row">
            <div class="col-12">
                <table class="table table rounded text-center">
                    <tr class="table-success">
                        <th scope="col" style="font-size: 20px;color: black">Name</th>
                        <th scope="col" style="font-size: 20px;color: black">Eamil</th>
                        <th scope="col" style="font-size: 20px;color: black">Cration date</th>
                        <th scope="col" style="font-size: 20px">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v" style="color: black"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                        {{ __('Delete') }}
                                    </button>
                                </div>
                            </div>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table rounded text-center">
                    <tr class="table-success">
                        <th scope="col" style="font-size: 20px;color: black">Name</th>
                        <th scope="col" style="font-size: 20px;color: black">Eamil</th>
                        <th scope="col" style="font-size: 20px;color: black">Cration date</th>
                        <th scope="col" style="font-size: 20px">
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v" style="color: black"></i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                        {{ __('Delete') }}
                                    </button>
                                </div>
                            </div>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush