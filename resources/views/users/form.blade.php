<div class="form-group">
    <label>Nombre completo</label>
    {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre completo']) }}
    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
</div>
<div class="form-group">
    {{ Form::label('email') }}
    {{ Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label>Contraseña</label>
    <input type="password" name="password" placeholder="Contraseña"
        class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}">
    {!! $errors->first('password', '<div class="invalid-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label>Tipo de usuario</label>
    {{ Form::select('tipo', ['' => 'Seleccione...', 'ADMINISTRADOR' => 'ADMINISTRADOR', 'SECRETARIA' => 'SECRETARIA'], null, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : '')]) }}
    {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
</div>
