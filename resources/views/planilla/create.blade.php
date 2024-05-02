<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <!-- Title -->
                <h1>Operaciones con la planilla CSV</h1>
                <hr>
                <form action="{{ route('planilla.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                Subir al servidor
                            </button>
                        </div>
                    </div>
                </form>
                <!--form end-->
                <hr>

                {!!Form::open(['route'=>['planilla.destroy'], 'method' => 'DELETE', 'class'=>'form-horizontal'])!!}
                <div class="form-group">
                    <label class="col-md-4 control-label">Borrar CSV</label>
                    <div class="col-md-6">
                        <button type="submit" onclick="return confirm('¿Seguro que desea eliminar? esta acción no se podrá deshacer')" class="btn btn-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Eliminar CSV</button>
                    </div>
                </div>
                {!!Form::close()!!}
                <hr>

                <form method="get" action="{{ route('planilla.show') }}" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Exportar Planilla</label>
                        <div class="col-md-6">
                            <button type="submit" onclick="return confirm('¿Seguro que desea exportar?')" class="btn btn-success"><i class="fa fa-cloud-download" aria-hidden="true"></i> Exportar Planilla</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-md-4"><!-- Side Widget Well -->
                <div class="well">
                    <h4>Notas</h4>
                    <p>Estas operaciones pueden tardar unos minutos.</p>
                    <p>Antes de cargar el CSV asegurese de borrar los encabezados de cada columna en el archivo CSV.</p>
                </div>
            </div><!--end well-->
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