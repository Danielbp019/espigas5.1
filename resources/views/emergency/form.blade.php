<div class="form-group">
    <label class="col-md-4 control-label">Niu (*)</label>
    <div class="col-md-6">
        {!!Form::text('niu',null,['class'=>'form-control','placeholder'=>'Ingresa el niu', 'id'=>'niu', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de evento (*)</label>
    <div class="col-md-6">
        {!!Form::select('event_type_idevent_type', $event_type, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'id'=>'event_type_idevent_type', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Medio de solicitud (*)</label>
    <div class="col-md-6">
        {!!Form::select('application_means_idapplication_means', $application_means, null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'id'=>'application_means_idapplication_means', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Reporte de emergencia red (*)</label>
    <div class="col-md-6">
        {!!Form::select('emergency_network', config('options.emergency_network'), null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'id'=>'emergency_network', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Fecha de atencion</label>
    <div class="col-md-6">
        {!!Form::date('day_care',null,['class'=>'form-control','placeholder'=>'Ingresa el dia de atención', 'id'=>'day_care'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">hora de atencion</label>
    <div class="col-md-6">
        {!!Form::time('hour_care',null,['class'=>'form-control','placeholder'=>'Ingresa el dia de atención','id'=>'hour_care'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Observaciones</label>
    <div class="col-md-6">
        {!!Form::text('observations',null,['class'=>'form-control','placeholder'=>'Ingresa las observaciones', 'id'=>'observations'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Nombre de titular (*)</label>
    <div class="col-md-6">
        {!!Form::text('name_holder',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del titular', 'id'=>'name_holder', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Dirección (*)</label>
    <div class="col-md-6">
        {!!Form::text('address',null,['class'=>'form-control','placeholder'=>'Ingresa la dirección', 'id'=>'address', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Factura (*)</label>
    <div class="col-md-6">
        {!!Form::text('bill',null,['class'=>'form-control','placeholder'=>'Ingresa la factura', 'id'=>'bill', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">nombre de solicitante (*)</label>
    <div class="col-md-6">
        {!!Form::text('name_applicant',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del solicitante', 'id'=>'name_applicant', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Identificacion de solicitante (*)</label>
    <div class="col-md-6">
        {!!Form::text('identity_applicant',null,['class'=>'form-control','placeholder'=>'Ingresa la identificacion del solicitante', 'id'=>'identity_applicant', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Telefono</label>
    <div class="col-md-6">
        {!!Form::number('phone',null,['class'=>'form-control','placeholder'=>'Ingresa el telefono', 'id'=>'phone', 'min' => '0'])!!}
    </div>
</div>
