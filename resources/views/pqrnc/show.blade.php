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
                    {!!Form::model($pqrnc, ['route'=>['pqrnc.show',$pqrnc],'method'=>'PUT', 'class'=>'form-horizontal'])!!}


                    <table border="0" width="800px">
                        <tr>
                            <td><img src="{{ asset('img/logo2.png') }}" width="205" height="45" /></td>
                            <td>&nbsp;</td>
                            <td><strong>PETICIONES O SOLICITUDES QUE NO CONSTITUYEN RECLAMACION</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>RADICADO:</strong></label>
                                {{$pqrnc->idpqrnc}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>NIU o CC:</strong></label>
                                {{$pqrnc->niu}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE:</strong></label>
                                {{$pqrnc->user}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE PREDIO:</strong></label>
                                {{$pqrnc->address}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TELEFONO:</strong></label>
                                {{$pqrnc->phone}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>MEDIO DE SOLICITUD:</strong></label>
                                {{$pqrnc->application_means}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TIPO DE TRAMITE:</strong></label>
                                {{$pqrnc->procedure_pqrnc}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>TIPO DE RESPUESTA:</strong></label>
                                {{$pqrnc->answer_pqrnc}}
                            </td>
                        </tr>
                        <td colspan="3">
                            <label class="contact"><strong>INFORMACION ADICIONAL:<br /></strong></label>
                            <br />
                            <?php 
                                $texto1 = $pqrnc->additional_information;
                                $texto1 = wordwrap($texto1, 100, "<br />",1);
                                echo $texto1;
                                ?>
                        </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>TRATAMIENTO:</strong></label>
                                <br />
                                <?php 
                                    $texto2 = $pqrnc->treatment;
                                    $texto2 = wordwrap($texto2, 100, "<br />",1);
                                    echo $texto2;
                                    ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>FECHA Y HORA:</strong></label>
                                {{$pqrnc->created_at}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"></label>
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
                                <label class="contact"><strong>FIRMA DE LA EMPRESA:<br />
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
                    </table>
                    {!! Form::close() !!}

                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br /> {!!Form::model($pqrnc, ['route'=>['pqrnc.show',$pqrnc],'method'=>'PUT', 'class'=>'form-horizontal'])!!}


                    <table border="0" width="800px">
                        <tr>
                            <td><img src="{{ asset('img/logo2.png') }}" width="205" height="45" /></td>
                            <td>&nbsp;</td>
                            <td><strong>PETICIONES O SOLICITUDES QUE NO CONSTITUYEN RECLAMACION</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>RADICADO:</strong></label>
                                {{$pqrnc->idpqrnc}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>NIU o CC:</strong></label>
                                {{$pqrnc->niu}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE:</strong></label>
                                {{$pqrnc->user}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE PREDIO:</strong></label>
                                {{$pqrnc->address}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TELEFONO:</strong></label>
                                {{$pqrnc->phone}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>MEDIO DE SOLICITUD:</strong></label>
                                {{$pqrnc->application_means}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TIPO DE TRAMITE:</strong></label>
                                {{$pqrnc->procedure_pqrnc}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>TIPO DE RESPUESTA:</strong></label>
                                {{$pqrnc->answer_pqrnc}}
                            </td>
                        </tr>
                        <td colspan="3">
                            <label class="contact"><strong>INFORMACION ADICIONAL:<br /></strong></label>
                            <br />
                            <?php 
                                $texto1 = $pqrnc->additional_information;
                                $texto1 = wordwrap($texto1, 100, "<br />",1);
                                echo $texto1;
                                ?>
                        </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>TRATAMIENTO:</strong></label>
                                <br />
                                <?php 
                                    $texto2 = $pqrnc->treatment;
                                    $texto2 = wordwrap($texto2, 100, "<br />",1);
                                    echo $texto2;
                                    ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>FECHA Y HORA:</strong></label>
                                {{$pqrnc->created_at}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"></label>
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
                                <label class="contact"><strong>FIRMA DE LA EMPRESA:<br />
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
