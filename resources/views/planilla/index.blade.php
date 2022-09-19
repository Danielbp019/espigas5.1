<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-12">
                <!-- buscador-->
                {!!Form::model(Request::all(),['route'=>'planilla.index', 'method'=>'GET', 'class'=>'navbar-form pull-right'])!!}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i> </span> {!!Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Digite un NIU', 'aria-describedby'=>'search'])!!}
                </div>
                <button type="submit" class="btn btn-default"> Enviar</button>
                {!! Form::close() !!}
                <!--fin dle buscador-->
                <table class="table table-bordered table-hover table-condensed">
                    <thead>
                        <th>NIU</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Factura</th>
                    </thead>
                    @foreach($planillas as $planilla)
                    <tbody style="background-color:#fff; color:#000">
                        <td>{{$planilla->codigo}}</td>
                        <td>{{$planilla->usuario}}</td>
                        <td>{{$planilla->direccion}}</td>
                        <td>{{$planilla->factura}}</td>
                    </tbody>
                    @endforeach
                </table>
                {!!$planillas->appends(Request::only(['codigo']))->render()!!}

                <hr>
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