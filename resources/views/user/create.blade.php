<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <!-- Blog Post -->
                <!-- Title -->
                <h1>Crear usuarios</h1>
                <hr> {!!Form::open(['route'=>'user.store', 'method'=>'POST', 'class'=>'form-horizontal'])!!} {{ csrf_field() }}
                <!--form start-->
                @include('user.form')

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </div>

                {!! Form::close() !!}
                <hr>
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

            <!--    menu    -->
            @include('menus.users')
            <!--    end menu    -->

        </div>
        <!-- /.row -->
        <hr>
        <!-- Footer -->
        @yield('Footer')
    </div>
    <!-- /.container -->
    @endsection
    <?php }?>