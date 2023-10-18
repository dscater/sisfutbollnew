@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-dark">Editar Partido</h1>

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

                        {!! Form::open(array('route' => ['partidos.update',$id],'method'=>'PATCH')) !!}
                        <div class="box-body">
                            <div class="form-group">
                                {{ Form::label('campeonato_id') }}
                                {!! Form::select('campeonato_id',$campeonato, $partido->campeonato_id, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Equipo A') }}
                                {!! Form::select('equipoA_id',$equipo,$partido->equipoA_id, array('class' => 'form-control')) !!}
                            </div>
                            <h3>VS</h3>
                            <div class="form-group">
                                {{ Form::label('Equipo B') }}
                                {!! Form::select('equipoB_id',$equipo,$partido->equipoB_id, array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('gol_equipoA') }}
                                {{ Form::text('gol_equipoA', $partido->gol_equipoA, ['class' => 'form-control' . ($errors->has('gol_equipoA') ? ' is-invalid' : ''), 'placeholder' => 'gol_equipoA']) }}
                                {!! $errors->first('gol_equipoA', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('gol_equipoB') }}
                                {{ Form::text('gol_equipoB', $partido->gol_equipoB, ['class' => 'form-control' . ($errors->has('gol_equipoB') ? ' is-invalid' : ''), 'placeholder' => 'gol_equipoB']) }}
                                {!! $errors->first('gol_equipoB', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('fecha_partido') }}
                                {{ Form::date('fecha_Par', $partido->fecha_Par, ['class' => 'form-control' . ($errors->has('fecha_par') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio']) }}
                                {!! $errors->first('fecha_Par', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('hora') }}
                                {{ Form::text('hora', $partido->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fin']) }}
                                {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('walkover') }}
                                {{ Form::select('walkover', ['0'=>'ninguno', $partido->equipoA_id=>$equipo[$partido->equipoA_id], $partido->equipoB_id=>$equipo[$partido->equipoB_id]], [$partido->walkover], ['class' => 'form-control' . ($errors->has('walkover') ? ' is-invalid' : ''), 'placeholder' => 'walkover']) }}
                                {!! $errors->first('walkover', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('detalle') }}
                                {{ Form::text('detalle', $partido->detalle, ['class' => 'form-control' . ($errors->has('detalle') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fin']) }}
                                {!! $errors->first('detalle', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('estado') }}
                                {!! Form::select('estado',['0' => 'Pendiente', '1' => 'Terminado'], array('class' => 'form-control')) !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('tipo') }}
                                {!! Form::select('tipo', ['1' => 'clasificatoria','0' => 'Final'], array('class' => 'form-control')) !!}
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
