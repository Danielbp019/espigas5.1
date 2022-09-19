<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-12">
                <!-- Blog Post -->
                <!-- Title -->
                <h1>Lista de emergencias</h1>
                <hr> @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif

                <!-- buscador-->
                {!!Form::model(Request::all(),['route'=>'emergency.index', 'method'=>'GET', 'class'=>'navbar-form pull-right'])!!}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i> </span> {!!Form::text('niu',null,['class'=>'form-control','placeholder'=>'Digite un NIU', 'aria-describedby'=>'search'])!!}
                </div>
                <button type="submit" class="btn btn-default"> Enviar</button>
                {!! Form::close() !!}
                <!--fin dle buscador-->
                <!--***************************-->
                <table class="table table-bordered table-hover table-condensed">
                    <thead>
                        <th>Radicado recibido</th>
                        <th>Niu</th>
                        <th>Fecha de solicitud</th>
                        <th>hora de solicitud</th>
                        <th>Tipo de evento</th>
                        <th>Nombre solicitante</th>
                        <th>Identificacion solicitante</th>
                        <th>Factura</th>
                        <th>Emergencia red</th>

                        <th>Editar</th>
                        <th>Imprimir</th>
                    </thead>
                    @foreach($emergencys as $emergency)
                    <tbody style="background-color:#fff; color:#000">
                        <td>{{$emergency->radicated_received}}</td>
                        <td>{{$emergency->niu}}</td>
                        <td>{{$emergency->application_date}}</td>
                        <td>{{$emergency->time_application}}</td>
                        <td>{{$emergency->event_type}}</td>
                        <td>{{$emergency->name_applicant}}</td>
                        <td>{{$emergency->identity_applicant}}</td>
                        <td>{{$emergency->bill}}</td>
                        <td>{{$emergency->emergency_network}}</td>

                        <td>{!!link_to_route('emergency.edit', $title='Editar', $parameters=$emergency->radicated_received, $attributes=['class'=>'btn btn-primary'])!!}</td>
                        <td>
                            {!!link_to_route('emergency.show', $title='Imprimir', $parameters=$emergency->radicated_received, $attributes=['class'=>'btn btn-info', 'target'=>'_blank'])!!}
                        </td>

                    </tbody>
                    @endforeach
                </table>
                {!!$emergencys->appends(Request::only(['niu']))->render()!!}
                <!--***************************-->
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