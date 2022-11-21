@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-success-50">Documentos</h1>

        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('documento.create') }}">Nuevo</a>

                            <table class="table table-striped mt-1">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff;">Contenido</th>
                                    <th style="color:#fff;">Descripcion</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($documentos as $doc)
                                        <tr>
                                            <td>{{ $doc->id }}</td>
                                            <td>{{ $doc->titulo }}</td>
                                            <td>{{ $doc->contenido }}</td>
                                            <td>{{ $doc->descripcion }}</td>

                                            <td>
                                                <a class="btn btn-primary" href="{{ route('documento.editar', $doc->id)}}">Ver y/o Editar</a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['documento.destroy', $doc->id],'style'=>'display:inline']) !!}
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
