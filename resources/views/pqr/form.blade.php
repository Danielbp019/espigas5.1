<div class="form-group">
    <label class="col-md-4 control-label">Planilla mes (*)</label>
    <div class="col-md-6">
        {!!Form::select('month', $planilla, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'required'])!!}
    </div>
</div>

<div class="panel panel-primary">
    <div class="panel-heading"><strong>Datos Titular</strong></div>
    <div class="panel-body">

        <div class="form-group">
            <label class="col-md-4 control-label">Niu (*)</label>
            <div class="col-md-6">
                {!!Form::text('niu',null,['class'=>'form-control','placeholder'=>'Ingresa el NIU o CC', 'required'])!!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Nombre de titular (*)</label>
            <div class="col-md-6">
                {!!Form::text('user',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del titular', 'required'])!!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Dirección (*)</label>
            <div class="col-md-6">
                {!!Form::text('address',null,['class'=>'form-control','placeholder'=>'Ingrese la dirección', 'required'])!!}
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Factura (*)</label>
            <div class="col-md-6">
                {!!Form::text('bill',null,['class'=>'form-control','placeholder'=>'Ingrese el numero de factura', 'required'])!!}
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
                {!!Form::text('identity_applicant',null,['class'=>'form-control','placeholder'=>'Ingrese identificación del solicitante', 'required'])!!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Nombre solicitante (*)</label>
            <div class="col-md-6">
                {!!Form::text('name_applicant',null,['class'=>'form-control','placeholder'=>'Ingrese nombre solicitante', 'required'])!!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Dirección de notificación (*)</label>
            <div class="col-md-6">
                {!!Form::text('address_applicant',null,['class'=>'form-control','placeholder'=>'Ingrese dirección de notificación', 'required'])!!}
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label">Teléfono</label>
            <div class="col-md-6">
                {!!Form::number('phone',null,['class'=>'form-control','placeholder'=>'Ingrese ingresa el telefono'])!!}
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Medio de solicitud (*)</label>
    <div class="col-md-6">
        {!!Form::select('application_means_idapplication_means', $application_means, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de tramite (*)</label>
    <div class="col-md-6">
        {!!Form::select('procedure_pqr_idprocedure_pqr', $procedure_pqr, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Detalle de la causal (*)</label>
    <div class="col-md-6">
        <!-- input-group -->
        <div class="input-group">
            {!!Form::select('causal_detail_idcausal_detail', $causal_detail, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'required'])!!}
            <span class="input-group-btn">
            <button class="btn btn-default" type="button" onclick="window.open(' {{asset('help/causales_2016.pdf')}} ')" /><i class="fa fa-question" aria-hidden="true"></i></button>
          </span>
        </div>
        <!-- /input-group -->
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Información adicional</label>
    <div class="col-md-6">
        {!!Form::text('additional_information',null,['class'=>'form-control','placeholder'=>'Ingresa la información adicional'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tratamiento</label>
    <div class="col-md-6">
        {!!Form::text('treatment',null,['class'=>'form-control','placeholder'=>'Ingresa el tratamiento'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de respuesta (*)</label>
    <div class="col-md-6">

        <!-- input-group -->
        <div class="input-group">
            {!!Form::select('answer_pqr_idanswer_pqr', $answer_pqr, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'required'])!!}
            <span class="input-group-btn">
            <button class="btn btn-default" type="button" onclick="window.open(' {{asset('help/tipo_respuesta.html')}} ')" /><i class="fa fa-question" aria-hidden="true"></i></button>
          </span>
        </div>
        <!-- /input-group -->
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Pendiente (*)</label>
    <div class="col-md-6">
        {!!Form::select('pending', config('options.pending'), null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Traslado a súper intendencia (*)</label>
    <div class="col-md-6">
        <select class="form-control" name="sspd">
            <option value="" disabled selected>Seleccione...</option>
            <option value=" ">NO</option>
            <option value="<?php echo date(" Y-m-d ") ?>">SI</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de notificación (*)</label>
    <div class="col-md-6">
        {!!Form::select('notification_pqr_idnotification_pqr', $notification_pqr, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'required'])!!}
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Codigo dane departamento (*)</label>
    <div class="col-md-6">
        <!-- input-group -->
        <div class="input-group">
            {!!Form::text('department_code', '15', ['class'=>'form-control', 'required', 'readonly'])!!}
            <span class="input-group-addon"><i class="fa fa-ban" aria-hidden="true"></i> </span>
        </div>
        <!-- /input-group -->
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Codigo dane municipio (*)</label>
    <div class="col-md-6">
        <!-- input-group -->
        <div class="input-group">
            {!!Form::text('municipality_code', '469', ['class'=>'form-control', 'required', 'readonly'])!!}
            <span class="input-group-addon"><i class="fa fa-ban" aria-hidden="true"></i> </span>
        </div>
        <!-- /input-group -->
    </div>
</div>
<div class="form-group">
    <label class="col-md-4 control-label">Asentamiento(*)</label>
    <div class="col-md-6">
        <!-- input-group -->
        <div class="input-group">
            {!!Form::text('settlement_type', '000', ['class'=>'form-control', 'required', 'readonly'])!!}
            <span class="input-group-addon"><i class="fa fa-ban" aria-hidden="true"></i> </span>
        </div>
        <!-- /input-group -->
    </div>
</div>
