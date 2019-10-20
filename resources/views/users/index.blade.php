@extends('layouts.app', ['title' => __('User Management')])
@section('js')
    <script type="text/javascript" src="{{asset('js/user_index.js')}}"></script>
@endsection
@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt-1">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-2">
                                <select class="custom-select mb-0" id="inputGroupSelect01" >
                                    <option value="Admin" selected>Admin</option>
                                    <option value="Stuff">Stuff</option>
                                    <option value="Security guard">Security guard</option>
                                </select>
                                <!-- <h3 class="mb-0">{{ __('Users') }}</h3> -->
                            </div>
                            <div class="col-6">
                                
                            </div>
                            <!-- add admin -->
                            <div class="col-4 text-right" id="add_admin">
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add Admin') }}</a>
                            </div>
                            <!-- add stuff -->
                            <div class="col-4 text-right" id="add_stuff">
                                <a href="{{ route('user.createStuff') }}" class="btn btn-sm btn-primary">{{ __('Add Stuff') }}</a>
                            </div>
                            <!-- add security guard -->
                            <div class="col-4 text-right" id="add_security_guard">
                                <a href="{{ route('user.createSecurity') }}" class="btn btn-sm btn-primary">{{ __('Add Security Guard') }}</a>
                            </div>
                        </div>
                    </div>
                    
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
                    <!-- admin table -->
                    <div class="table-responsive" id="adminTable">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $admin->email }}">{{ $admin->email }}</a>
                                        </td>
                                        <td>{{ $admin->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    @if ($admin->id != auth()->id())
                                                        <form action="{{ route('user.destroy', $admin) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            
                                                            <a class="dropdown-item" href="{{ route('user.edit', $admin) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
                                                        </form>    
                                                    @else
                                                        <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Edit') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <?php echo $admins->render(); ?>
                    </div>
                    <!-- stuff table -->
                    <div class="table-responsive" id="stuffTable">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($stuffs->count() > 0)
                                @foreach ($stuffs as $stuff)
                                    <tr>
                                        <td>{{ $stuff->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $stuff->email }}">{{ $stuff->email }}</a>
                                        </td>
                                        <td>{{ $stuff->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                   <form action="{{ route('user.destroy', $stuff) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a class="dropdown-item" href="{{ route('user.edit', $stuff) }}">{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                        </button>
                                                    </form>     
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                        <?php echo $stuffs->render(); ?>
                    </div>
                    <!-- security gurad table -->
                    <div class="table-responsive" id="securityGuardTable">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($securitys as $security)
                                    <tr>
                                        <td>{{ $security->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $security->email }}">{{ $security->email }}</a>
                                        </td>
                                        <td>{{ $security->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <form action="{{ route('user.destroy', $security) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a class="dropdown-item" href="{{(route('securityView',['security_id'=>$security->id]))}}">{{ __('View') }}</a>
                                                        <a class="dropdown-item" href="{{(route('user.editSecutiy',['securityId'=>$security->id]))}}">{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                        </button>
                                                    </form>    
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <?php echo $securitys->render(); ?>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $users->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection