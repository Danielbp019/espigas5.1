<div class="form-group">
    <label class="col-md-4 control-label">Niu o CC(*)</label>
    <div class="col-md-6">
        {!!Form::text('niu',null,['class'=>'form-control','placeholder'=>'Ingresa el NIU o CC', 'id'=>'niu', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Nombre de titular(*)</label>
    <div class="col-md-6">
        <div class="input-group">
            {!!Form::text('user',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del titular', 'id'=>'user', 'required', 'readonly'])!!}
            <span class="input-group-addon"><i class="fa fa-ban" aria-hidden="true" title="No editable"></i> </span>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Dirección(*)</label>
    <div class="col-md-6">
        <div class="input-group">
            {!!Form::text('address',null,['class'=>'form-control','placeholder'=>'Ingrese la dirección', 'id'=>'address', 'required', 'readonly'])!!}
            <span class="input-group-addon"><i class="fa fa-ban" aria-hidden="true" title="No editable"></i> </span>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Telefono</label>
    <div class="col-md-6">
        {!!Form::number('phone',null,['class'=>'form-control','placeholder'=>'Ingresa el telefono', 'id'=>'phone', 'min' => '0'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Medio de solicitud (*)</label>
    <div class="col-md-6">
        {!!Form::select('application_means_idapplication_means', $application_means, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'id'=>'application_means_idapplication_means', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de tramite(*)</label>
    <div class="col-md-6">
        <div class="input-group">
            {!!Form::select('procedure_pqrnc_idprocedure_pqrnc', $procedure_pqrnc, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'id'=>'procedure_pqrnc_idprocedure_pqrnc', 'required'])!!}
            <span class="input-group-btn">
                <!-- Trigger the modal with a button -->
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#ModalayudaTipo_tramite_pqnc"><i class="fa fa-question" aria-hidden="true" title="Ayuda"></i></button>
            </span>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="ModalayudaTipo_tramite_pqnc" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:#000;">Tipo de tramite Pqnc</h4>
            </div>
            <div class="modal-body" style="color:#000;">
                <table border="1" cellpadding="0" style="width: 100%; text-align: center;">
                    <tr>
                        <td style="width: 10%;"><strong>CODIGO</strong></td>
                        <td style="width: 20%;"><strong>CLASE DE PETICION</strong></td>
                        <td style="width: 70%;"><strong>DEFINICION</strong></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Conexión o instalación</td>
                        <td>Corresponde a aquellas peticiones que presentan los suscriptores potenciales o usuarios para obtener conexión
                            del servicio. En el caso de Gas combustible por redes no se deberán considerar las solicitudes de instalaciones
                            internas.</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Reinstalación</td>
                        <td>Cuando el suscriptor o usuario solicita la reinstalación del servicio por causa del corte efectuado por el
                            prestador.</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Reconexión</td>
                        <td>Cuando el suscriptor o usuario solicita la reconexión del servicio por causa de la suspensión efectuada por el
                            prestador.</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Terminación de contrato</td>
                        <td>Cuando el suscriptor o usuario solicita la terminación del contrato de servicios públicos.</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<!--endmodal-->

<div class="form-group">
    <label class="col-md-4 control-label">Tratamiento</label>
    <div class="col-md-6">
        {!!Form::text('treatment',null,['class'=>'form-control','placeholder'=>'Ingresa el tratamiento', 'id'=>'treatment'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Información adicional</label>
    <div class="col-md-6">
        {!!Form::text('additional_information',null,['class'=>'form-control','placeholder'=>'Ingresa la información adicional', 'id'=>'treatment'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Pendiente(*)</label>
    <div class="col-md-6">
        {!!Form::select('pending', config('options.pending'), null, ['class'=>'form-control', 'placeholder' =>
        'Seleccione...', 'id'=>'pending', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de respuesta(*)</label>
    <div class="col-md-6">
        <div class="input-group">
            {!!Form::select('answer_pqrnc_idanswer_pqrnc', $answer_pqrnc, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'id'=>'answer_pqrnc_idanswer_pqrnc', 'required'])!!}
            <span class="input-group-btn">
                <!-- Trigger the modal with a button -->
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#ModalayudaTipo_rta_pqnc"><i class="fa fa-question" aria-hidden="true" title="Ayuda"></i></button>
            </span>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="ModalayudaTipo_rta_pqnc" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:#000;">Tipo de respuesta Pqnc</h4>
            </div>
            <div class="modal-body" style="color:#000;">
                <p>
                    <strong>1. Rechazada.</strong> Cuando por razones normativas, técnicas u operativas no es posible atender la
                    petición.<br />
                    <strong>2. Aceptada ejecutada. </strong>Cuando la empresa acepta la petición y ha ejecutado el
                    requerimiento.<br />
                    <strong>3. Aceptada en trámite.</strong> Cuando la empresa acepta la petición y se encuentra en trámite par la
                    ejecución.<br />
                    <strong>4. Pendiente gestión del suscriptor o usuario.</strong> Cuando la empresa acepta la petición y la
                    ejecución depende exclusivamente de trámites que deben realizar el suscriptor o usuario.<br />
                    <strong>5. Pendiente de respuesta. </strong>Cuando el prestador aún se encuentra dentro de los término legales
                    para dar respuesta.<br />
                    <strong>6. Sin respuesta.</strong> Cuando para la fecha de reporte se han vencido los términos de ley sin que se
                    haya emitido respuesta.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<!--endmodal-->

<div class="form-group">
    <label class="col-md-4 control-label">Fecha de respuesta</label>
    <div class="col-md-6">
        {!!Form::date('answer_date',null,['class'=>'form-control', 'id'=>'answer_date'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Fecha de ejecución</label>
    <div class="col-md-6">
        {!!Form::date('execution_date',null,['class'=>'form-control', 'id'=>'execution_date'])!!}
    </div>
</div>