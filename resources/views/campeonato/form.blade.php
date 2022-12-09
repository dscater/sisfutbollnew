<div class="form-group">
    {{ Form::label('nombre') }}
    {{ Form::text('nombre', null, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
    {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('fecha_inicio') }}
    {{ Form::date('fecha_inicio', null, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio']) }}
    {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('fecha_fin') }}
    {{ Form::date('fecha_fin', null, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fin']) }}
    {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('descripcion') }}
    {{ Form::text('descripcion', null, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('serie') }}
    {!! Form::select('serie', [""=>"Seleccione...",'SERIE 1' => 'SERIE 1', 'SERIE 2' => 'SERIE 2', 'SERIE 3' => 'SERIE 3', 'SERIE 6' => 'SERIE 6'], null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {{ Form::label('estado') }}
    {!! Form::select('estado', ['0' => 'Activo', '1' => 'Terminado'], null, ['class' => 'form-control']) !!}
</div>
