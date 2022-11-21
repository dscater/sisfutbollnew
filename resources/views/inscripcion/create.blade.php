@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Inscripcion</h1>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @php

                            @endphp

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

                        {!! Form::open(array('route' => ['inscripcion.store',$id],'method'=>'POST')) !!}
                        <div class="box-body">

                            <div class="form-group">
                                {{ Form::label('campeonato_id') }}
                                {!! Form::select('campeonato_id', $campeonatos,$id, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('equipo_id') }}
                                {!! Form::select('equipo_id', $equipos,[], array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('observacion') }}
                                {{ Form::text('observacion', null, ['class' => 'form-control' . ($errors->has('observacion') ? ' is-invalid' : ''), 'placeholder' => 'observacion']) }}
                                {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                        </div>
                        <div class="box-footer mt20">
                            <button type="submit" class="btn btn-primary">crear</button>
                        </div>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
