@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Editar sancion</h1>
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

                        {!! Form::open(array('route' => ['noticia.update',$id],'method'=>'PATCH')) !!}
                        <div class="box-body">

                            <div class="form-group">
                                {{ Form::label('nombre') }}
                                {{ Form::text('nombre', $sanciones->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                                {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                            </div>
                            <div class="form-group">
                                {{ Form::label('detalle') }}
                                {{ Form::text('detalle', $sanciones->detalle, ['class' => 'form-control' . ($errors->has('detalle') ? ' is-invalid' : ''), 'placeholder' => 'detalle']) }}
                                {!! $errors->first('detalle', '<div class="invalid-feedback">:message</div>') !!}
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
