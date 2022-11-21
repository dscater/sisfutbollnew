@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Editar Noticia</h1>
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
                            {{ Form::label('titulo') }}
                            {{ Form::text('titulo', $noticias->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'titulo']) }}
                            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('contenido') }}
                            {{ Form::text('contenido', $noticias->contenido, ['class' => 'form-control' . ($errors->has('contenido') ? ' is-invalid' : ''), 'placeholder' => 'contenido']) }}
                            {!! $errors->first('contenido', '<div class="invalid-feedback">:message</div>') !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('descripcion') }}
                            {{ Form::text('descripcion', $noticias->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('status') }}
                            {{ Form::text('status', $noticias->status, ['class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'status']) }}
                            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
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
