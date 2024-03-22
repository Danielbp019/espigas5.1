<div class="form-group">
    <label class="col-md-4 control-label">Planilla mes (*)</label>
    <div class="col-md-6">
        {!!Form::select('month', $planilla, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'id'=>'month', 'required'])!!}
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading"><strong>Datos Titular</strong></div>
    <div class="panel-body">

        <div class="form-group">
            <label class="col-md-4 control-label">Niu (*)</label>
            <div class="col-md-6">
                {!!Form::text('niu',null,['class'=>'form-control','placeholder'=>'Ingresa el NIU', 'id'=>'niu', 'required'])!!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Nombre de titular (*)</label>
            <div class="col-md-6">
                <div class="input-group">
                    {!!Form::text('user',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del titular', 'id'=>'user', 'required', 'readonly'])!!}
                    <span class="input-group-addon"><i class="fa fa-ban" aria-hidden="true" title="No editable"></i> </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Dirección (*)</label>
            <div class="col-md-6">
                <div class="input-group">
                    {!!Form::text('address',null,['class'=>'form-control','placeholder'=>'Ingrese la dirección', 'id'=>'address', 'required', 'readonly'])!!}
                    <span class="input-group-addon"><i class="fa fa-ban" aria-hidden="true" title="No editable"></i> </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Factura (*)</label>
            <div class="col-md-6">
                <div class="input-group">
                    {!!Form::text('bill',null,['class'=>'form-control','placeholder'=>'Ingrese el numero de factura', 'id'=>'bill', 'required', 'readonly'])!!}
                    <span class="input-group-addon"><i class="fa fa-ban" aria-hidden="true" title="No editable"></i> </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-warning">
    <div class="panel-heading"><strong>Datos solicitante</strong></div>
    <div class="panel-body">

        <div class="form-group">
            <label class="col-md-4 control-label">Identificación del solicitante (*)</label>
            <div class="col-md-6">
                {!!Form::text('identity_applicant',null,['class'=>'form-control','placeholder'=>'Ingrese identificación del solicitante', 'id'=>'identity_applicant', 'required'])!!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Nombre solicitante (*)</label>
            <div class="col-md-6">
                {!!Form::text('name_applicant',null,['class'=>'form-control','placeholder'=>'Ingrese nombre solicitante', 'id'=>'name_applicant', 'required'])!!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Dirección de notificación (*)</label>
            <div class="col-md-6">
                {!!Form::text('address_applicant',null,['class'=>'form-control','placeholder'=>'Ingrese dirección de notificación', 'id'=>'address_applicant', 'required'])!!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Teléfono</label>
            <div class="col-md-6">
                {!!Form::number('phone',null,['class'=>'form-control','placeholder'=>'Ingrese ingresa el telefono', 'id'=>'phone', 'min' => '0'])!!}
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Medio de solicitud (*)</label>
    <div class="col-md-6">
        {!!Form::select('application_means_idapplication_means', $application_means, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'id'=>'application_means_idapplication_means', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de tramite (*)</label>
    <div class="col-md-6">
        {!!Form::select('procedure_pqr_idprocedure_pqr', $procedure_pqr, null, ['class'=>'form-control', 'placeholder'=> 'Seleccione...', 'id'=>'procedure_pqr_idprocedure_pqr', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Detalle de la causal (*)</label>
    <div class="col-md-6">
        <div class="input-group">
            {!!Form::select('causal_detail_idcausal_detail', $causal_detail, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'id'=>'causal_detail_idcausal_detail', 'required'])!!}
            <span class="input-group-btn">
                <button class="btn btn-default" type="button" onclick="window.open('{{ asset('help/causales_2016.pdf') }}', '_blank')" ><i class="fa fa-question" aria-hidden="true" title="Ayuda"></i></button>
            </span>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Información adicional</label>
    <div class="col-md-6">
        {!!Form::text('additional_information',null,['class'=>'form-control','placeholder'=>'Ingresa la información adicional', 'id'=>'additional_information'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tratamiento</label>
    <div class="col-md-6">
        {!!Form::text('treatment',null,['class'=>'form-control','placeholder'=>'Ingresa el tratamiento', 'id'=>'treatment'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de respuesta (*)</label>
    <div class="col-md-6">

        <div class="input-group">
            {!!Form::select('answer_pqr_idanswer_pqr', $answer_pqr, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'id'=>'answer_pqr_idanswer_pqr', 'required'])!!}
            <span class="input-group-btn">
                <!-- Trigger the modal with a button -->
                <button class="btn btn-default" type="button" data-toggle="modal" data-target="#ModalayudaTipo_respuesta"><i class="fa fa-question" aria-hidden="true" title="Ayuda"></i></button>
            </span>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="ModalayudaTipo_respuesta" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:#000;">Tipo de respuesta</h4>
            </div>
            <div class="modal-body" style="color:#000;">
                <p>
                    <strong>1. Accede.</strong> Cuando el prestador accede a todas las pretensiones del suscriptor o usuario.<br />
                    <strong>2. Accede parcialmente.</strong> Cuando el prestador accede parcialmente a las pretensiones de
                    suscriptor o usuario.<br />
                    <strong>3. No accede.</strong> Cuando el prestador no accede a ninguna de las pretensiones del suscriptor
                    usuario.<br />
                    <strong>4. Confirma decisión.</strong> Cuando el prestador confirma la decisión de primera instancia en el
                    recurso de reposición.<br />
                    <strong>5. Modifica.</strong> Cuando el prestador modifica parcialmente la decisión de primera instancia en el
                    recurso de reposición<br />
                    <strong>6. Revoca.</strong> Cuando el prestador revoca la decisión de primera instancia en el recurso de
                    reposición<br />
                    <strong>7. Rechaza.</strong> Cuando se rechaza el trámite de los recursos de reposición o recursos de reposición
                    en subsidio de apelación.<br />
                    <strong>8. Traslada por competencia.</strong> Cuando la reclamación no es de competencia de la ESP.<br />
                    <strong>9. Pendiente de respuesta.</strong> Cuando el prestador aun se encuentra dentro de los términos legales
                    para dar respuesta o se encuentra dentro de los términos de suspensión por práctica de pruebas.<br />
                    <strong>10. Sin respuesta.</strong> Cuando para la fecha de reporte se han vencido los términos de ley sin que
                    se haya emitido respuesta.<br />
                    <strong>11. Archiva. </strong>Cuando el trámite termina por acuerdo de pago, transacción, conciliación o por
                    desistimiento presentado por el suscriptor o usuario.
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
    <label class="col-md-4 control-label">Pendiente (*)</label>
    <div class="col-md-6">
        {!!Form::select('pending', config('options.pending'), null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'id'=>'pending', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Traslado a súper intendencia (*)</label>
    <div class="col-md-6">
        <select class="form-control" name="sspd" id="sspd" required>
            <option value="" disabled selected>Seleccione...</option>
            <option value="<?php echo date(" Y-m-d ") ?>">SI</option>
            <option value=" ">NO</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de notificación (*)</label>
    <div class="col-md-6">
        {!!Form::select('notification_pqr_idnotification_pqr', $notification_pqr, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'id'=>'notification_pqr_idnotification_pqr', 'required'])!!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Codigo dane departamento (*)</label>
    <div class="col-md-6">
        <div class="input-group">
            {!!Form::text('department_code', '15', ['class'=>'form-control', 'id'=>'department_code', 'required', 'readonly'])!!}
            <span class="input-group-addon"><i class="fa fa-ban" aria-hidden="true" title="No editable"></i> </span>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Codigo dane municipio (*)</label>
    <div class="col-md-6">
        <div class="input-group">
            {!!Form::text('municipality_code', '469', ['class'=>'form-control', 'id'=>'municipality_code', 'required', 'readonly'])!!}
            <span class="input-group-addon"><i class="fa fa-ban" aria-hidden="true" title="No editable"></i> </span>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Asentamiento(*)</label>
    <div class="col-md-6">
        <div class="input-group">
            {!!Form::text('settlement_type', '000', ['class'=>'form-control', 'id'=>'settlement_type', 'required', 'readonly'])!!}
            <span class="input-group-addon"><i class="fa fa-ban" aria-hidden="true" title="No editable"></i> </span>
        </div>
    </div>
</div>