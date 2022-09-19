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
                    {!!Form::model($pqr, ['route'=>['pqr.show',$pqr],'method'=>'PUT', 'class'=>'form-horizontal'])!!}

                    <table border="0" width="800px">
                        <tr>
                            <td><img src="{{ asset('img/logo2.png') }}" width="205" height="45" /></td>
                            <td>&nbsp;</td>
                            <td><strong>FORMATO PETICIONES, QUEJAS Y RECLAMOS</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>RADICADO:</strong></label>
                                </label>
                                {{$pqr->idpqr}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>NIU:</strong></label> {{$pqr->niu}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE DEL TITULAR:</strong></label> {{$pqr->user}}

                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE PREDIO:</strong></label> {{$pqr->address}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>Nro FACTURA:</strong></label> {{$pqr->bill}}
                                </label>
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>IDENTIFICACION DEL SOLICITANTE:</strong></label> {{$pqr->identity_applicant}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE SOLICITANTE:</strong></label> {{$pqr->name_applicant}}

                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE NOTIFICACION:</strong></label> {{$pqr->address}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TELEFONO:</strong></label> {{$pqr->phone}}

                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>MEDIO DE SOLICITUD:</strong></label> {{$pqr->application_means}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TIPO TRAMITE:</strong></label> {{$pqr->procedure_pqr}}

                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DETALLE DE LA CAUSAL:</strong></label> {{$pqr->causal_detailcol}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>GRUPO DE CAUSAL:</strong></label> {{$pqr->causal_group}}

                            </td>
                            <td>&nbsp;</td>
                            <td><strong>*GRUPOS DE CAUSAL:</strong> F: Facturación, I: Instalación y P: Prestación </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>INFORMACION ADICIONAL:<br /></strong></label>
                                <br />
                                <?php
		                          $texto1 = $pqr->additional_information;
                                    $texto1 = wordwrap($texto1, 100, "<br />",1);
                                    echo $texto1;
	                               ?>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>TRATAMIENTO:<br /></strong></label>
                                <br />
                                <?php
		                          $texto1 = $pqr->treatment;
                                    $texto1 = wordwrap($texto1, 100, "<br />",1);
                                    echo $texto1;
	                               ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TIPO DE RESPUESTA:</strong></label> {{$pqr->answer_pqr}}

                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>PENDIENTE:</strong></label> {{$pqr->pending}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TIPO DE NOTIFICACION:</strong></label> {{$pqr->notification_pqr}}

                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>FECHA Y HORA DEL PQR:</strong></label> {{$pqr->created_at}}

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
                            <td colspan="3">
                                <p class="letrap">*El tiempo máximo para responder a las quejas, reclamos, peticiones y recursos presentados por el usuario, según la ley 142 de 1994 se establece que el termino de quince (15) días hábiles contados a partir de la fecha de solicitud.
                                    <br /> * Si están en desacuerdo con la decisión puede interponer dentro de (5) cinco días hábiles siguientes, el recurso de reposición y subsidiariamente el de apelación ante a superintendencia de servicio públicos domiciliarios.</p>
                            </td>
                        </tr>
                    </table>
                    </form>
                    {!! Form::close() !!}

                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <br /> {!!Form::model($pqr, ['route'=>['pqr.show',$pqr],'method'=>'PUT', 'class'=>'form-horizontal'])!!}

                    <table border="0" width="800px">
                        <tr>
                            <td><img src="{{ asset('img/logo2.png') }}" width="205" height="45" /></td>
                            <td>&nbsp;</td>
                            <td><strong>FORMATO PETICIONES, QUEJAS Y RECLAMOS</strong></td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>RADICADO:</strong></label>
                                </label>
                                {{$pqr->idpqr}}
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>NIU:</strong></label> {{$pqr->niu}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE DEL TITULAR:</strong></label> {{$pqr->user}}

                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE PREDIO:</strong></label> {{$pqr->address}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>Nro FACTURA:</strong></label> {{$pqr->bill}}
                                </label>
                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>IDENTIFICACION DEL SOLICITANTE:</strong></label> {{$pqr->identity_applicant}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>NOMBRE SOLICITANTE:</strong></label> {{$pqr->name_applicant}}

                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DIRECCION DE NOTIFICACION:</strong></label> {{$pqr->address}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TELEFONO:</strong></label> {{$pqr->phone}}

                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>MEDIO DE SOLICITUD:</strong></label> {{$pqr->application_means}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TIPO TRAMITE:</strong></label> {{$pqr->procedure_pqr}}

                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>DETALLE DE LA CAUSAL:</strong></label> {{$pqr->causal_detailcol}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>GRUPO DE CAUSAL:</strong></label> {{$pqr->causal_group}}

                            </td>
                            <td>&nbsp;</td>
                            <td><strong>*GRUPOS DE CAUSAL:</strong> F: Facturación, I: Instalación y P: Prestación </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>INFORMACION ADICIONAL:<br /></strong></label>
                                <br />
                                <?php
		                          $texto1 = $pqr->additional_information;
                                    $texto1 = wordwrap($texto1, 100, "<br />",1);
                                    echo $texto1;
	                               ?>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <label class="contact"><strong>TRATAMIENTO:<br /></strong></label>
                                <br />
                                <?php
		                          $texto1 = $pqr->treatment;
                                    $texto1 = wordwrap($texto1, 100, "<br />",1);
                                    echo $texto1;
	                               ?>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TIPO DE RESPUESTA:</strong></label> {{$pqr->answer_pqr}}

                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>PENDIENTE:</strong></label> {{$pqr->pending}}

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="contact"><strong>TIPO DE NOTIFICACION:</strong></label> {{$pqr->notification_pqr}}

                            </td>
                            <td>&nbsp;</td>
                            <td>
                                <label class="contact"><strong>FECHA Y HORA DEL PQR:</strong></label> {{$pqr->created_at}}

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
                            <td colspan="3">
                                <p class="letrap">*El tiempo máximo para responder a las quejas, reclamos, peticiones y recursos presentados por el usuario, según la ley 142 de 1994 se establece que el termino de quince (15) días hábiles contados a partir de la fecha de solicitud.
                                    <br /> * Si están en desacuerdo con la decisión puede interponer dentro de (5) cinco días hábiles siguientes, el recurso de reposición y subsidiariamente el de apelación ante a superintendencia de servicio públicos domiciliarios.</p>
                            </td>
                        </tr>
                    </table>
                    </form>
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
