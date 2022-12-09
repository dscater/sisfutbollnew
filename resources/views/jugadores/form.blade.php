<div class="form-group">
    {{ Form::label('nombre') }}
    {{ Form::text('nom', null, ['class' => 'form-control' . ($errors->has('nom') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
    {!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('Apellido_Paterno') }}
    {{ Form::text('apep', null, ['class' => 'form-control' . ($errors->has('apep') ? ' is-invalid' : ''), 'placeholder' => 'Ap. Paterno']) }}
    {!! $errors->first('apep', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('Apellido_Materno') }}
    {{ Form::text('apem', null, ['class' => 'form-control' . ($errors->has('apem') ? ' is-invalid' : ''), 'placeholder' => 'Ap. Materno']) }}
    {!! $errors->first('apem', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('CI') }}
    {{ Form::text('ci', null, ['class' => 'form-control' . ($errors->has('ci') ? ' is-invalid' : ''), 'placeholder' => 'ci']) }}
    {!! $errors->first('ci', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('ci_exp.') }}
    {{ Form::text('ci_exp', null, ['class' => 'form-control' . ($errors->has('ci_exp') ? ' is-invalid' : ''), 'placeholder' => 'ci exp.']) }}
    {!! $errors->first('ci_exp', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {{ Form::label('fecha_nacimiento') }}
    {{ Form::date('fecha_nac', null, ['class' => 'form-control' . ($errors->has('fecha_nac') ? ' is-invalid' : ''), 'placeholder' => 'Fecha nac']) }}
    {!! $errors->first('fecha_nac', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label>Lugar de nacimiento</label>
    {{ Form::text('lugar_nac', null, ['class' => 'form-control' . ($errors->has('lugar_nac') ? ' is-invalid' : ''), 'placeholder' => 'lugar de nacimiento']) }}
    {!! $errors->first('lugar_nac', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('nacionalidad') }}
    {{ Form::text('nacionalidad', null, ['class' => 'form-control' . ($errors->has('nacionalidad') ? ' is-invalid' : ''), 'placeholder' => 'nacionalidad']) }}
    {!! $errors->first('nacionalidad', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('nro._casaca') }}
    {{ Form::text('nro_casaca', null, ['class' => 'form-control' . ($errors->has('nro_casaca') ? ' is-invalid' : ''), 'placeholder' => 'nro. casaca']) }}
    {!! $errors->first('nro_casaca', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('fecha_afiliacion') }}
    {{ Form::date('fecha_afi', null, ['class' => 'form-control' . ($errors->has('fecha_afi') ? ' is-invalid' : ''), 'placeholder' => 'Fecha afi']) }}
    {!! $errors->first('fecha_afi', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('foto') }}
    {{ Form::file('foto', null, ['class' => 'form-control' . ($errors->has('foto') ? ' is-invalid' : ''), 'placeholder' => 'foto']) }}
    {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('observación') }}
    {{ Form::text('observacion', null, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'observación']) }}
    {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label>Equipo/Club</label>
    {!! Form::select('equipoclub_id', $equipos, [], ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {{ Form::label('Etado') }}
    {!! Form::select('status', ['0' => 'Activo', '1' => 'Terminado'], null, ['class' => 'form-control']) !!}
</div>