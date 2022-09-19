<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-8">
                <!-- Blog Post -->
                <!-- Title (metodo put para actualizar) -->
                <h1>Editar Emergencias</h1>
                <hr> {!!Form::model($emergency, ['route'=>['emergency.update',$emergency],'method'=>'PUT', 'class'=>'form-horizontal'])!!}
                <!--form start-->
                @include('emergency.form')

                <!--hidden-->
                <input type="hidden" name="user_update" value="{{Auth::user()->id}}">
                <!--form end-->
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button>
                    </div>
                </div>
                {!! Form::close() !!} @if(Auth::user()->role == 'admin') {!!Form::open(['route'=>['emergency.destroy', $emergency], 'method' => 'DELETE', 'class'=>'form-horizontal'])!!}
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
                    <p>Los campos de fecha siempre deberán seguir el formato año, mes día. (año-mes-dia)</p>
                    <p>Los campos de hora siempre deberán seguir el formato hora, minutos, segundos. (hora:minutos:segundos)</p>
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
