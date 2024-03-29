@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-dark">Editar Equipo</h1>
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
                            {!! Form::model($equipo, [
                                'route' => ['equipos.update', $id],
                                'method' => 'PATCH',
                                'enctype' => 'multipart/form-data',
                            ]) !!}
                            <div class="box-body">

                                <div class="form-group">
                                    {{ Form::label('nombre') }}
                                    {{ Form::text('name', null, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('logo') }}
                                    {{ Form::file('logo', null, ['class' => 'form-control' . ($errors->has('logo') ? ' is-invalid' : ''), 'placeholder' => 'logo']) }}
                                    {!! $errors->first('logo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    <label>Fecha de fundación</label>
                                    {{ Form::date('fecha_fund', null, ['class' => 'form-control' . ($errors->has('fecha_fund') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fundacion']) }}
                                    {!! $errors->first('fecha_fund', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('presidente') }}
                                    {{ Form::text('presidente', null, ['class' => 'form-control' . ($errors->has('presidente') ? ' is-invalid' : ''), 'placeholder' => 'presidente']) }}
                                    {!! $errors->first('presidente', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('vicepresidente') }}
                                    {{ Form::text('vicepresidente', null, ['class' => 'form-control' . ($errors->has('vicepresidente') ? ' is-invalid' : ''), 'placeholder' => 'vicepresidente']) }}
                                    {!! $errors->first('vicepresidente', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('color_camiseta') }}
                                    {{ Form::text('color_camiseta', null, ['class' => 'form-control' . ($errors->has('color_camiseta') ? ' is-invalid' : ''), 'placeholder' => 'color camiseta']) }}
                                    {!! $errors->first('color_camiseta', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('color_pantalon') }}
                                    {{ Form::text('color_pantalo', null, ['class' => 'form-control' . ($errors->has('color_pantalo') ? ' is-invalid' : ''), 'placeholder' => 'color pantalon']) }}
                                    {!! $errors->first('color_pantalo', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('color_medias') }}
                                    {{ Form::text('color_medias', null, ['class' => 'form-control' . ($errors->has('color_medias') ? ' is-invalid' : ''), 'placeholder' => 'color medias']) }}
                                    {!! $errors->first('color_medias', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('dirección') }}
                                    {{ Form::text('direccion', null, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'dirección']) }}
                                    {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('celular') }}
                                    {{ Form::text('celular', null, ['class' => 'form-control' . ($errors->has('celular') ? ' is-invalid' : ''), 'placeholder' => 'celular']) }}
                                    {!! $errors->first('celular', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('email') }}
                                    {{ Form::text('email', null, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'email']) }}
                                    {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('observación') }}
                                    {{ Form::text('observacion', null, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'observación']) }}
                                    {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('estado') }}
                                    {!! Form::select('estado', ['activo' => 'Activo', 'Terminado' => 'Terminado'], null, [
                                        'class' => 'form-control',
                                    ]) !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('categoría') }}
                                    {!! Form::select('categoria_id', $categoria, [], ['class' => 'form-control']) !!}
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
