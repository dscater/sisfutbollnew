@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-blue-50">Jugadores</h1>
        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('jugadores.create') }}">Nuevo</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped mt-1 data-table">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Foto</th>
                                    <th style="color:#fff;">CI</th>
                                    <th style="color:#fff;">CI_Exp</th>
                                    <th style="color:#fff;">Nro Casaca</th>
                                    <th style="color:#fff;">Equipo</th>
                                    <th style="color:#fff;">Acciones</th>


                                </thead>
                                <tbody>
                                    @foreach ($jugadores as $jugador)
                                        <tr>
                                            <td>{{ $jugador->id }}</td>
                                            <td>{{ $jugador->nom }}
                                                {{ $jugador->apep }}
                                                {{ $jugador->apem }}
                                            </td>
                                            <td><img src="{{ asset($jugador->foto) }}" alt="{{ $jugador->foto }}"
                                                    class="img-fluid" width="120" height="120"></td>
                                            <td>{{ $jugador->ci }}</td>
                                            <td>{{ $jugador->ci_exp }}</td>
                                            <td>{{ $jugador->nro_casaca }}</td>
                                            <td>{{ $equipos[$jugador->equipoclub_id] }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-block mb-1"
                                                    href="{{ route('jugadores.edit', $jugador->id) }}">Ver y/o Editar</a>
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['jugadores.destroy', $jugador->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-block mb-1']) !!}
                                                {!! Form::close() !!}
                                                <a class="btn btn-success btn-block mb-1"
                                                href="{{ route('jugador_equipos.index', $jugador->id) }}">Equipos</a>
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
