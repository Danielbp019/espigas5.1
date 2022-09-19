<?php if (Auth::check()) { ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Daniel, col.">

        <title>Espigas</title>

        <!-- Bootstrap Core CSS -->
        {!!Html::style('css/bootstrap.min.css')!!}
        <!-- Parrafo CSS -->
        {!!Html::style('css/letrap.css')!!}
        <!--favicon-->
        <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" />
    </head>

    <body>

        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <!-- Blog Post Content Column -->
                <div class="col-lg-8">
                    <!-- Blog Post -->
                    <!-- Title (metodo put para actualizar) -->
                    {!!Form::model($emergency, ['route'=>['emergency.show',$emergency],'method'=>'PUT', 'class'=>'form-horizontal'])!!}


                    <table border="0" width="800px">
                        <tr>
                            <td><img src="{{ asset('img/logo2.png') }}" width="205" height="45" /></td>
                            <td>&nbsp;</td>
                            <td><strong>FORMATO EMERGENCIAS</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>RADICADO:</strong></label> {{$emergency->radicated_received}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>NIU:</strong></label> {{$emergency->niu}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE DEL TITULAR:</strong></label> {{$emergency->name_holder}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE PREDIO:</strong></label> {{$emergency->address}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>Nro FACTURA:</strong></label> {{$emergency-> bill}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>IDENTIFICACION DEL SOLICITANTE:</strong></label> {{$emergency-> identity_applicant}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE SOLICITANTE:</strong></label> {{$emergency->name_applicant}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE NOTIFICACION:</strong></label> {{$emergency->address}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TELEFONO:</strong></label> {{$emergency->phone}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>TIPO DE EVENTO:</strong></label> {{$emergency->event_type}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TIPO DE SOLICITUD:</strong></label> {{$emergency-> application_means}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>EMERGENCIA RED:</strong></label> {{$emergency->emergency_network}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>FECHA Y HORA DE LA EMERGENCIA:</strong></label> {{$emergency->application_date}} - {{$emergency-> time_application}}
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>OBSERVACIONES:<br /></strong></label>
                                <?php 
                                $texto1 = $emergency->observations;
                                $texto1 = wordwrap($texto1, 100, "<br />",1);
                                echo $texto1;
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="4">
                                <label class="contact"><strong>USUARIO NOTIFICADO:<br />
                                  <br />
                                    <br />
                                  _________________________________<br />
                                  </strong></label>
                            </td>
                            <td>&nbsp;</td>
                            <td rowspan="4">
                                <label class="contact"><strong>FIRMA EMPRESA:<br />
                                  <br />

                                    <br />
                                     _________________________________<br />
                                  </strong></label>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <!--&-->
                        </tr>
                    </table>
                    {!! Form::close() !!}

                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br /> {!!Form::model($emergency, ['route'=>['emergency.show',$emergency],'method'=>'PUT', 'class'=>'form-horizontal'])!!}


                    <table border="0" width="800px">
                        <tr>
                            <td><img src="{{ asset('img/logo2.png') }}" width="205" height="45" /></td>
                            <td>&nbsp;</td>
                            <td><strong>FORMATO EMERGENCIAS</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>RADICADO:</strong></label> {{$emergency->radicated_received}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>NIU:</strong></label> {{$emergency->niu}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE DEL TITULAR:</strong></label> {{$emergency->name_holder}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE PREDIO:</strong></label> {{$emergency->address}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>Nro FACTURA:</strong></label> {{$emergency-> bill}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>IDENTIFICACION DEL SOLICITANTE:</strong></label> {{$emergency-> identity_applicant}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE SOLICITANTE:</strong></label> {{$emergency->name_applicant}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE NOTIFICACION:</strong></label> {{$emergency->address}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TELEFONO:</strong></label> {{$emergency->phone}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>TIPO DE EVENTO:</strong></label> {{$emergency->event_type}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TIPO DE SOLICITUD:</strong></label> {{$emergency-> application_means}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>EMERGENCIA RED:</strong></label> {{$emergency->emergency_network}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>FECHA Y HORA DE LA EMERGENCIA:</strong></label> {{$emergency->application_date}} - {{$emergency-> time_application}}
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>OBSERVACIONES:<br /></strong></label>
                                <?php 
                                $texto1 = $emergency->observations;
                                $texto1 = wordwrap($texto1, 100, "<br />",1);
                                echo $texto1;
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <td rowspan="4">
                                <label class="contact"><strong>USUARIO NOTIFICADO:<br />
                                  <br />
                                    <br />
                                  _________________________________<br />
                                  </strong></label>
                            </td>
                            <td>&nbsp;</td>
                            <td rowspan="4">
                                <label class="contact"><strong>FIRMA EMPRESA:<br />
                                  <br />

                                    <br />
                                     _________________________________<br />
                                  </strong></label>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <!--&-->
                        </tr>
                    </table>
                    {!! Form::close() !!}

                </div>
                <!-- Blog Sidebar Widgets Column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <?php }?>
            <!-- jQuery -->
            {!!Html::script('js/jquery.js')!!}
            <!-- Bootstrap Core JavaScript -->
            {!!Html::script('js/bootstrap.min.js')!!}
    </body>

    </html>
