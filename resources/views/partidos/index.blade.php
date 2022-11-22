@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-blue-50">Partidos</h1>
        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('partidos.buscar') }}">
                        <div class="form-row">
                            <div class="col-sm-4 my-1">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <h4>Campeonatos</h4>
                                    <div class="form-group">
                                        {!! Form::select('campeonato_id', $campeonato, $id, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto my-1">
                                <input type="submit" class="btm btn-primary btn-sm" value="Mostrar">
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('partidos.create') }}">Nuevo</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped mt-1 data-table">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro.</th>
                                    <th style="color:#fff;">Campeonato</th>
                                    <th style="color:#fff;">Equipo A</th>
                                    <th style="color:#fff;">Goles A</th>
                                    <th style="color:#fff;">Equipo B</th>
                                    <th style="color:#fff;">Goles B</th>
                                    <th style="color:#fff;">Fecha</th>
                                    <th style="color:#fff;">Hora</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Tipo</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($partidos as $partido)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $campeonato[$partido->campeonato_id] }}</td>
                                            <td>{{ $equipo[$partido->equipoA_id] }}</td>
                                            <td>
                                                @if (intval($partido->equipoA_id) == intval($partido->walkover))
                                                    <h5 class="text-danger">{{ 'walkover' }}</h5>
                                                @else
                                                    @if ($partido->gol_equipoA > $partido->gol_equipoB || $partido->gol_equipoA == $partido->gol_equipoB)
                                                        <h3 class="text-success">{{ $partido->gol_equipoA }}</h3>
                                                    @else
                                                        <h3 class="text-danger">{{ $partido->gol_equipoA }}</h3>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>{{ $equipo[$partido->equipoB_id] }}</td>
                                            <td>
                                                @if (intval($partido->equipoB_id) == intval($partido->walkover))
                                                    <h5 class="text-danger">{{ 'walkover' }}</h5>
                                                @else
                                                    @if ($partido->gol_equipoB > $partido->gol_equipoA || $partido->gol_equipoA == $partido->gol_equipoB)
                                                        <h3 class="text-success">{{ $partido->gol_equipoB }}</h3>
                                                    @else
                                                        <h3 class="text-danger">{{ $partido->gol_equipoB }}</h3>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>{{ $partido->fecha_Par }}</td>
                                            <td>{{ $partido->hora }}</td>
                                            <td>
                                                @if ($partido->estado == '1')
                                                    {{ 'Terminado' }}
                                                @else
                                                    {{ 'Pendiente' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($partido->tipo == '3')
                                                    {{ 'Terceros' }}
                                                @elseif ($partido->tipo == '2')
                                                    {{ 'SemiFinales' }}
                                                @elseif ($partido->tipo == '0')
                                                    {{ 'Final' }}
                                                @elseif ($partido->tipo == '1')
                                                    {{ 'Eliminatorias' }}
                                                @endif

                                            </td>

                                            <td>
                                                @if ($partido->estado == '1')
                                                    {{-- <a class="btn btn-success btn-block mb-1"
                                                        href="{{ route('puntos.create', $partido->id) }}">Actualizar
                                                        puntos</a> --}}
                                                @else
                                                @endif
                                                <a class="btn btn-primary btn-block mb-1"
                                                    href="{{ route('partidos.edit', $partido->id) }}">Ver y/o Editar</a>
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['partidos.destroy', $partido->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-block mb-1']) !!}
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
