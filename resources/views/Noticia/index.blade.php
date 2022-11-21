@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-success-50">Noticias</h1>

        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('noticia.create') }}">Nuevo</a>

                            <table class="table table-striped mt-1">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff;">Contenido</th>
                                    <th style="color:#fff;">Descripcion</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($noticias as $not)
                                        <tr>
                                            <td>{{ $not->id }}</td>
                                            <td>{{ $not->titulo }}</td>
                                            <td>{{ $not->contenido }}</td>
                                            <td>{{ $not->descripcion }}</td>

                                            <td>
                                                <a class="btn btn-primary" href="{{ route('noticia.editar', $not->id)}}">Ver y/o Editar</a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['noticia.destroy', $not->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
