<?php if (Auth::check()) { ?>
    @extends('layouts/principal') @section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Post Content Column -->
            <div class="col-lg-12">
                <!-- Blog Post -->
                <!-- Title -->
                <h1>Lista de pqr</h1>
                <hr> @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{Session::get('message')}}
                </div>
                @endif

                <!-- buscador-->
                {!!Form::open(['route'=>'pqr.index', 'method'=>'GET', 'class'=>'navbar-form pull-right'])!!}
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i> </span> {!!Form::text('niu',null,['class'=>'form-control','placeholder'=>'Digite un NIU', 'aria-describedby'=>'search'])!!}
                </div>
                {!!Form::select('pending', config('options.pending'), null, ['class'=>'form-control', 'placeholder' => 'Pendiente?'])!!}
                <button type="submit" class="btn btn-default"> Enviar</button>
                {!! Form::close() !!}
                <!--fin dle buscador-->
                <!--***************************-->
                <table class="table table-bordered table-hover table-condensed">
                    <thead>
                        <th>ID</th>
                        <th>Niu</th>
                        <th>Usuario</th>
                        <th>Fecha de solicitud</th>
                        <th>Factura</th>
                        <th>Información adicional</th>
                        <th>Días acumulados</th>
                        <th>Pendiente</th>

                        <th>Editar</th>
                        <th>Imprimir</th>
                    </thead>
                    @foreach($pqrs as $pqr)
                    <tbody style="background-color:#fff; color:#000">
                        <td>{{$pqr->idpqr}}</td>
                        <td>{{$pqr->niu}}</td>
                        <td>{{$pqr->user}}</td>
                        <td>{{$pqr->date}}</td>
                        <td>{{$pqr->bill}}</td>
                        <td>{{$pqr->additional_information}}</td>
                        <td>
                            <?php
                            $fecha1 = $pqr['date'];//valor de blade a php
                            $entrega = strtotime ( '+12 day' , strtotime ( $fecha1 ) ) ; 
                            $entrega = date ( 'Y-m-d' , $entrega ); 
                            //se imprime, fecha actual mas 12 dias 
                            //echo $entrega;
                            $fecha_actual = strtotime(date("Y-m-d H:i:s") );
                            $fecha_actual = date ('Y-m-d' , $fecha_actual);
                            //se imprime para verificar que las fechas resultantes sean acorde a los calculos realizados
                            //echo $fecha_actual;
                            if($entrega<$fecha_actual){ 
                               $Fecha_color = '#DD0000';//si es mayor color rojo
                            }
                            else{
                               $Fecha_color = '#000';//si es menor color negro
                            }
    
                            $fecha= $fecha1;
                            $segundos=strtotime('now') - strtotime($fecha);
                            $diferencia_dias=intval($segundos/60/60/24);
                            echo "<div style=color:$Fecha_color;>La cantidad de días entre el ".$fecha." y hoy es <b>".$diferencia_dias."</b></div>";
                          ?>
                        </td>
                        <td>{{$pqr->pending}}</td>

                        <td>{!!link_to_route('pqr.edit', $title='Editar', $parameters=$pqr->idpqr, $attributes=['class'=>'btn btn-primary'])!!}</td>
                        <td>
                            {!!link_to_route('pqr.show', $title='Imprimir', $parameters=$pqr->idpqr, $attributes=['class'=>'btn btn-info', 'target'=>'_blank'])!!}
                        </td>

                    </tbody>
                    @endforeach
                </table>
                {!!$pqrs->appends(Request::only(['niu','pending']))->render()!!}
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