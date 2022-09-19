<div class="form-group">
    <label class="col-md-4 control-label">Nombre de usuario</label>
    <div class="col-md-6">
        {!!Form::text('name',null,['class'=>'form-control','placeholder'=>'Ingrese el nombre de usuario', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Tipo de rol</label>
    <div class="col-md-6">
        {!!Form::select('role', config('options.role'), null, ['class'=>'form-control', 'placeholder' => 'Seleccione...', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Contraseña</label>
    <div class="col-md-6">
        {!!Form::password('password',['class'=>'form-control', 'placeholder'=>'Ingresa tu contraseña', 'required'])!!}
    </div>
</div>

<div class="form-group">
    <label class="col-md-4 control-label">Activo</label>
    <div class="col-md-6">
        <label>{!!Form::radio('active', '1', true)!!} Si</label>
        <label>{!!Form::radio('active', '0')!!} No</label>
    </div>
</div>