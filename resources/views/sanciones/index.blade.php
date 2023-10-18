@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-dark">Sanciones</h1>
        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('sanciones.create') }}">Nuevo</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped mt-1 data-table">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro.</th>
                                    <th style="color:#fff;">Jugador</th>
                                    <th style="color:#fff;">Tarjeta</th>

                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($sanciones as $sancion)
                                        <tr>
                                            <td>{{ $sancion->id }}</td>
                                            <td>{{ $sancion->jugador->full_name }}</td>
                                            <td>{{ $sancion->tarjeta }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-block mb-1"
                                                    href="{{ route('sanciones.editar', $sancion->id) }}">Ver y/o Editar</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['sanciones.destroy', $sancion->id], 'style' => 'display:inline']) !!}
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
