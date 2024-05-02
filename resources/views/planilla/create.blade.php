<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Title -->
                <h1>Operaciones con la planilla CSV</h1>
                <hr>
                {!! Form::open(['route'=>'planilla.store', 'method'=>'POST', 'class'=>'form-horizontal', 'files' => true]) !!}
                {{ csrf_field() }}

                <p>Estas operaciones pueden tardar unos minutos.</p>
                <br>
                <div class="form-group">
                    <label class="col-md-4 control-label">Archivo CSV</label>
                    <div class="col-md-6">
                        <input type="file" name="csv_file" required />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            Subir al servidor
                        </button>
                    </div>
                </div>
                {!! Form::close() !!}
                <!--form end-->
                <hr>

                {!!Form::open(['route'=>['planilla.destroy'], 'method' => 'DELETE', 'class'=>'form-horizontal'])!!}
                <div class="form-group">
                    <label class="col-md-4 control-label">Borrar CSV</label>
                    <div class="col-md-6">
                        <button type="submit" onclick="return confirm('¿Seguro que desea eliminar? esta acción no se podrá deshacer')" class="btn btn-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Eliminar</button>
                    </div>
                </div>
            </div>
            {!!Form::close()!!}
        </div>

    </div>
    <!-- /.row -->
    <hr>
    <!-- Footer -->
    @yield('Footer')
    </div>
    <!-- /.container -->
    @endsection
<?php } ?>