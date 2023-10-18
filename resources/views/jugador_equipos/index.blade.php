@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-dark">Equipos anteriores - {{$jugador->full_name}}</h1>

        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('jugador_equipos.create',$jugador->id) }}">Nuevo</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped mt-1 data-table">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro</th>
                                    <th style="color:#fff;">Equipo</th>
                                    <th style="color:#fff;">Año</th>
                                    <th style="color:#fff;">Descripción</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @php
                                        $cont=1;
                                    @endphp
                                    @foreach ($jugador_equipos as $jugador_equipo)
                                        <tr>
                                            <td>{{ $cont++ }}</td>
                                            <td>{{ $jugador_equipo->equipo }}</td>
                                            <td>{{ $jugador_equipo->anio }}</td>
                                            <td>{{ $jugador_equipo->descripcion }}</td>

                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('jugador_equipos.edit', $jugador_equipo->id) }}">Ver y/o Editar</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['jugador_equipos.destroy', $jugador_equipo->id], 'style' => 'display:inline']) !!}
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

@section('third_party_scripts')
    <script>
        $('table.data-table').DataTable({
            columns: [
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
