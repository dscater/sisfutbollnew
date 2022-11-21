@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-blue-50">Campeonatos</h1>

        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('campeonato.create') }}">Nuevo</a>

                            <table class="table table-striped mt-1">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Inicio</th>
                                    <th style="color:#fff;">Fin</th>
                                    <th style="color:#fff;">descripcion</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($camp as $cam)
                                        <tr>
                                            <td>{{ $cam->id }}</td>
                                            <td>{{ $cam->nombre }}</td>
                                            <td>{{ $cam->fecha_inicio }}</td>
                                            <td>{{ $cam->fecha_fin }}</td>
                                            <td>{{ $cam->descripcion }}</td>
                                            <td>
                                                @if ($cam->estado == 0)
                                                 {{ "Activo" }}
                                                 @else
                                                 {{ "Terminado" }}
                                                @endif

                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('campeonato.edit', $cam->id)}}">Ver y/o Editar</a>

                                                <a class="btn btn-info" href="{{ route('inscripcion.index', $cam->id)}}">Equipos</a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['campeonato.destroy', $cam->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                                <a class="btn btn-success" href="{{ route('partidos.generar', $cam->id)}}">Genr. T vs T</a>
                                                <a class="btn btn-success" href="{{ route('partidos.generarVar', $cam->id)}}">Genr. I y V</a>
                                                @if ($cam->estado == 1)
                                                <a href="{{ route('partidodownload-pdf', $cam->id) }}" class="btn btn-info"><i class="nav-icon fas fa-download"></i>  Report PDF</a>
                                                @endif
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
