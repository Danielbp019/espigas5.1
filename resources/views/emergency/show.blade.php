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

        <!-- Cargar Bootstrap 3.4.1 CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <!-- Cargar jQuery UI CSS -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <!-- Cargar Bootstrap 3.4.1 JS y jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        <!-- Cargar jQuery UI desde CDN -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    </head>

    <body>

        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <!-- Blog Post Content Column -->
                <div class="col-lg-8">
                    <!-- Blog Post -->
                    <!-- Title (metodo put para actualizar) -->
                    {!!Form::model($emergency, ['route'=>['emergency.show',$emergency],'method'=>'PUT',
                    'class'=>'form-horizontal'])!!}


                    <table border="0" width="800px">
                        <tr>
                            <td><img src="{{ asset('img/logo2.png') }}" width="205" height="45" /></td>
                            <td>&nbsp;</td>
                            <td><strong>FORMATO EMERGENCIAS</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>RADICADO:</strong></label>
                                {{ $emergency->radicated_received }}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>NIU:</strong></label> {{ $emergency->niu }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE DEL TITULAR:</strong></label>
                                {{ $emergency->name_holder }}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE PREDIO:</strong></label>
                                {{ $emergency->address }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>Nro FACTURA:</strong></label> {{ $emergency-> bill }}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>IDENTIFICACION DEL SOLICITANTE:</strong></label>
                                {{ $emergency-> identity_applicant }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE SOLICITANTE:</strong></label>
                                {{ $emergency->name_applicant }}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE NOTIFICACION:</strong></label>
                                {{ $emergency->address }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TELEFONO:</strong></label> {{ $emergency->phone }}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>TIPO DE EVENTO:</strong></label>
                                {{ $emergency->event_type }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TIPO DE SOLICITUD:</strong></label>
                                {{ $emergency-> application_means }}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>EMERGENCIA RED:</strong></label>
                                {{ $emergency->emergency_network }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>FECHA Y HORA DE LA EMERGENCIA:</strong></label>
                                {{ $emergency->application_date }} - {{ $emergency-> time_application }}
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>OBSERVACIONES:<br /></strong></label>
                                <?php
                                $texto1 = $emergency->observations;
                                $texto1 = wordwrap($texto1, 100, "<br />", 1);
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
                    <br /> {!!Form::model($emergency, ['route'=>['emergency.show',$emergency],'method'=>'PUT',
                    'class'=>'form-horizontal'])!!}


                    <table border="0" width="800px">
                        <tr>
                            <td><img src="{{ asset('img/logo2.png') }}" width="205" height="45" /></td>
                            <td>&nbsp;</td>
                            <td><strong>FORMATO EMERGENCIAS</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>RADICADO:</strong></label>
                                {{ $emergency->radicated_received }}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>NIU:</strong></label> {{ $emergency->niu }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE DEL TITULAR:</strong></label>
                                {{ $emergency->name_holder }}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE PREDIO:</strong></label>
                                {{ $emergency->address }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>Nro FACTURA:</strong></label> {{ $emergency-> bill }}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>IDENTIFICACION DEL SOLICITANTE:</strong></label>
                                {{ $emergency-> identity_applicant }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE SOLICITANTE:</strong></label>
                                {{ $emergency->name_applicant }}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE NOTIFICACION:</strong></label>
                                {{ $emergency->address }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TELEFONO:</strong></label> {{ $emergency->phone }}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>TIPO DE EVENTO:</strong></label>
                                {{ $emergency->event_type }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TIPO DE SOLICITUD:</strong></label>
                                {{ $emergency-> application_means }}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>EMERGENCIA RED:</strong></label>
                                {{ $emergency->emergency_network }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>FECHA Y HORA DE LA EMERGENCIA:</strong></label>
                                {{ $emergency->application_date }} - {{ $emergency-> time_application }}
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>OBSERVACIONES:<br /></strong></label>
                                <?php
                                $texto1 = $emergency->observations;
                                $texto1 = wordwrap($texto1, 100, "<br />", 1);
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
    <?php } ?>
    </body>

    </html>