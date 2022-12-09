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
                        </div>
                        <div class="card-body">
                            @if (session('bien'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            <button class="close" data-dismiss="alert">&times;</button>
                                            <strong><i class="fa fa-check-circle"></i>
                                                {{ session('bien') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <table class="table table-striped mt-1 data-table">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro.</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Inicio</th>
                                    <th style="color:#fff;">Fin</th>
                                    <th style="color:#fff;">Descripción</th>
                                    <th style="color:#fff;">Serie</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Equipos inscritos</th>
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
                                            <td>{{ $cam->serie }}</td>
                                            <td>
                                                @if ($cam->estado == 0)
                                                    {{ 'Activo' }}
                                                @else
                                                    {{ 'Terminado' }}
                                                @endif

                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-info mb-1 btn-block"
                                                    href="{{ route('inscripcion.index', $cam->id) }}">Ver equipos</a>
                                                <div class="badge badge-primary d-block text-md"><span
                                                        class="badge badge-info text-md">{{ count($cam->inscripcions) }}</span>
                                                    Inscrito(s)</div>
                                            </td>
                                            <td>
                                                <a class="btn btn-primary mb-1 btn-block"
                                                    href="{{ route('campeonato.edit', $cam->id) }}">Ver y/o Editar</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['campeonato.destroy', $cam->id], 'style' => 'display:inline']) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger mb-1 btn-block']) !!}
                                                {!! Form::close() !!}
                                                <a class="btn btn-success mb-1 btn-block"
                                                    href="{{ route('partidos.generar', $cam->id) }}?sw=tt">Genr. T vs T</a>
                                                <a class="btn btn-success mb-1 btn-block"
                                                    href="{{ route('partidos.generar', $cam->id) }}?sw=iv">Genr. I y V</a>
                                                @if ($cam->estado == 1)
                                                    <a href="{{ route('partidodownload-pdf', $cam->id) }}"
                                                        class="btn btn-info mb-1 btn-block"><i
                                                            class="nav-icon fas fa-download"></i> Reporte
                                                        PDF</a>
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


@section('third_party_scripts')
    <script>
        $('table.data-table').DataTable({
            columns: [
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                {
                    width: "10%"
                },
            ],
            scrollCollapse: true,
            language: lenguaje,
            pageLength: 25
        });
    </script>
@endsection
