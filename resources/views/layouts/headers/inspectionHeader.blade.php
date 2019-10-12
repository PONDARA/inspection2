<div class="header bg-gradient-primary pb-5 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row text-white text-center">
                <div class="col-lg-4">
                    <p>
                        <b>Guard: </b>{{$inspection->name}}
                    </p>
                </div>
                <div class="col-lg-4">
                    <p>
                        {{$inspection->created_at}}
                    </p>
                </div>
                <div class="col-lg-4">
                    @foreach($inspectorNames as $inspectorName)
                    <p>
                        <b>Inspector: </b>{{$inspectorName->name}}
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>