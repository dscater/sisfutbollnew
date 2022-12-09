<div class="form-group">
    <label>Seleccione Jugador</label>
    {{ Form::select('jugador_id', $array_jugadores, null, ['class' => 'form-control' . ($errors->has('jugador_id') ? ' is-invalid' : '')]) }}
    {!! $errors->first('jugador_id', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    <label>Seleccione tarjeta</label>
    {{ Form::select('tarjeta', ['' => 'Seleccione...', 'AMARILLA' => 'AMARILLA', 'ROJA' => 'ROJA'], null, ['class' => 'form-control' . ($errors->has('tarjeta') ? ' is-invalid' : '')]) }}
    {!! $errors->first('tarjeta', '<div class="invalid-feedback">:message</div>') !!}
</div>
