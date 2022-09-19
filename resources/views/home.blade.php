<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-8">
                <img class="img-responsive img-rounded" src="{{ asset('img/home.jpg') }}">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
                <h1>Sistema de información Espigas</h1>
                <hr>

                <div class="panel panel-info">
                    <div class="panel-heading">Hay pendientes
                        <?php echo $countpqrncs ?> PQRnC</div>
                    <div class="panel-body">
                        <a href="{{route('pqrnc.index')}}" class="list-group-item list-group-item-info"><i class="fa fa-share" aria-hidden="true"></i> Ir al Listado</a>
                    </div>
                </div>

                <div class="panel panel-info">
                    <div class="panel-heading">Hay pendientes
                        <?php echo $countpqrs ?> PQR</div>
                    <div class="panel-body">
                        <a href="{{route('pqr.index')}}" class="list-group-item list-group-item-info"><i class="fa fa-share" aria-hidden="true"></i> Ir al Listado</a>
                    </div>
                </div>

            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Content Row -->
        <div class="row">
            @include('menus.emergency')
            <!-- /.col-md-4 -->
            @if(Auth::user()->role == 'admin') @include('menus.users') @endif @include('menus.pqr')
        </div>
        <!-- /.row end -->

        <!-- Content Row -->
        <div class="row">
            @include('menus.pqrnc')
        </div>
        <!-- /.row end -->

        <hr>

        <!-- Footer -->
        @yield('Footer')
    </div>
    <!-- /.container -->
    @endsection
    <?php }?>