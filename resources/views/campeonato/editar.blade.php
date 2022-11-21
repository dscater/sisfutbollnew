@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Editar Campeonato</h1>
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

                        {!! Form::open(array('route' => ['campeonato.update',$id],'method'=>'PATCH')) !!}
                        <div class="box-body">
                        @foreach ($campeonato as $campe)


                            <div class="form-group">
                                {{ Form::label('nombre') }}
                                {{ Form::text('nombre', $campe->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('fecha_inicio') }}
                                {{ Form::date('fecha_inicio', $campe->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio']) }}
                                {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('fecha_fin') }}
                                {{ Form::date('fecha_fin', $campe->fecha_fin, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fin']) }}
                                {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('descripcion') }}
                                {{ Form::text('descripcion', $campe->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                                {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('estado') }}
                                {!! Form::select('estado',['0' => 'Activo', '1' => 'Terminado'], $campe->estado, array('class' => 'form-control')) !!}
                            </div>
                        @endforeach
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
