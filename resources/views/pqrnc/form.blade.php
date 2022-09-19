<div class="form-group">
    <label class="col-md-4 control-label">Niu o CC(*)</label>
    <div class="col-md-6">
        {!!Form::text('niu',null,['class'=>'form-control','placeholder'=>'Ingresa el NIU o CC', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Nombre de titular(*)</label>
    <div class="col-md-6">
        {!!Form::text('user',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre del titular...', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Dirección(*)</label>
    <div class="col-md-6">
        {!!Form::text('address',null,['class'=>'form-control','placeholder'=>'Ingrese la dirección', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Telefono</label>
    <div class="col-md-6">
        {!!Form::number('phone',null,['class'=>'form-control','placeholder'=>'Ingresa el telefono'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Medio de solicitud (*)</label>
    <div class="col-md-6">
        {!!Form::select('application_means_idapplication_means', $application_means, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de tramite(*)</label>
    <div class="col-md-6">
        <!-- input-group -->
        <div class="input-group">
            {!!Form::select('procedure_pqrnc_idprocedure_pqrnc', $procedure_pqrnc, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'required'])!!}
            <span class="input-group-btn">
            <button class="btn btn-default" type="button" onclick="window.open(' {{asset('help/tipo_tramite_pqnc.html')}} ')" /><i class="fa fa-question" aria-hidden="true"></i></button>
</span>
        </div>
        <!-- /input-group -->
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tratamiento</label>
    <div class="col-md-6">
        {!!Form::text('treatment',null,['class'=>'form-control','placeholder'=>'Ingresa el tratamiento'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Información adicional</label>
    <div class="col-md-6">
        {!!Form::text('additional_information',null,['class'=>'form-control','placeholder'=>'Ingresa la información adicional'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Pendiente(*)</label>
    <div class="col-md-6">
        {!!Form::select('pending', config('options.pending'), null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de respuesta(*)</label>
    <div class="col-md-6">
        <!-- input-group -->
        <div class="input-group">
            {!!Form::select('answer_pqrnc_idanswer_pqrnc', $answer_pqrnc, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'required'])!!}
            <span class="input-group-btn">
            <button class="btn btn-default" type="button" onclick="window.open(' {{asset('help/tipo_rta_pqnc.html')}} ')" /><i class="fa fa-question" aria-hidden="true"></i></button>
</span>
        </div>
        <!-- /input-group -->
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Fecha de respuesta</label>
    <div class="col-md-6">
        {!!Form::date('answer_date',null,['class'=>'form-control'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Fecha de ejecución</label>
    <div class="col-md-6">
        {!!Form::date('execution_date',null,['class'=>'form-control'])!!}
    </div>
</div>
