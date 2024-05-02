<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <!-- Blog Post -->
                <!-- Title (metodo put para actualizar) -->
                <h1>Editar peticiones, quejas y reclamos que no constituyen</h1>
                <hr> {!!Form::model($pqrnc, ['route'=>['pqrnc.update',$pqrnc],'method'=>'PUT', 'class'=>'form-horizontal'])!!}
                <!--form start-->
                @include('pqrnc.form')

                <!--hidden-->
                <input type="hidden" name="user_update" value="{{Auth::user()->id}}">

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar
                        </button>
                    </div>
                </div>
                {!! Form::close() !!} @if(Auth::user()->role == 'admin') {!!Form::open(['route'=>['pqrnc.destroy', $pqrnc], 'method' => 'DELETE', 'class'=>'form-horizontal'])!!}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" onclick="return confirm('¿Seguro que desea eliminar? esta acción no se podrá deshacer')" class="btn btn-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Eliminar</button>
                    </div>
                </div>
                {!!Form::close()!!} @endif
                <!--form end-->

            </div>

            <!--    menu    -->
            @include('menus.pqrnc')
            <!--    end menu    -->

        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        @yield('Footer')
    </div>
    <!-- /.container -->
    @endsection
<?php } ?>