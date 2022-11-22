@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Editar Perfil de Jugador</h1>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {!! Form::model($jugador, [
                                'route' => ['jugadores.update', $id],
                                'method' => 'PATCH',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            <div class="box-body">
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
                                    {{ Form::label('qr') }}
                                    {{ Form::text('qr', null, ['class' => 'form-control' . ($errors->has('qr') ? ' is-invalid' : ''), 'placeholder' => 'qr']) }}
                                    {!! $errors->first('qr', '<div class="invalid-feedback">:message</div>') !!}
                                </div>

                                <div class="form-group">
                                    <label>Equipo/Club</label>
                                    {!! Form::select('equipoclub_id', $equipos, [], ['class' => 'form-control']) !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('Etado') }}
                                    {!! Form::select('status', ['0' => 'Activo', '1' => 'Terminado'], null, ['class' => 'form-control']) !!}
                                </div>

                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Editar</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
