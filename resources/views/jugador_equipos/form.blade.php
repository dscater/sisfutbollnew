@if (isset($jugador_equipo))
    <input type="hidden" name="jugador_id" value="{{ $jugador_equipo->jugador_id }}">
@else
    <input type="hidden" name="jugador_id" value="{{ $jugador->id }}">
@endif

<div class="form-group">
    <label>Equipo</label>
    {{ Form::text('equipo', null, ['class' => 'form-control' . ($errors->has('equipo') ? ' is-invalid' : ''), 'placeholder' => 'Equipo']) }}
    {!! $errors->first('equipo', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label>Año</label>
    {{ Form::number('anio', null, ['class' => 'form-control' . ($errors->has('anio') ? ' is-invalid' : ''), 'placeholder' => 'Año']) }}
    {!! $errors->first('anio', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label>Descripción</label>
    {{ Form::textarea('descripcion', null, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripción', 'rows' => '2']) }}
    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
</div>
