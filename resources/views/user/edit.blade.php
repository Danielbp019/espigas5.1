<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <!-- Blog Post -->
                <!-- Title (metodo put para actualizar) -->
                <h1>Editar usuarios</h1>
                <hr> {!!Form::model($user, ['route'=>['user.update',$user],'method'=>'PUT', 'class'=>'form-horizontal'])!!}

                <!--form start-->
                @include('user.form')

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
                    </div>
                </div>
                {!! Form::close() !!}
                <!--boton-->
                @if(Auth::user()->role == 'admin') {!!Form::open(['route'=>['user.destroy', $user], 'method' => 'DELETE', 'class'=>'form-horizontal'])!!}
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" onclick="return confirm('¿Seguro que desea eliminar? esta acción no se podrá deshacer')" class="btn btn-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Eliminar</button>
                    </div>
                </div>
                {!!Form::close()!!} @endif

            </div>
            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- /.row -->
                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Notas</h4>
                    <p>La contraseña reconoce caracteres mayúsculas y minúsculas.</p>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        @yield('Footer')
    </div>
    <!-- /.container -->
    @endsection
    <?php }?>