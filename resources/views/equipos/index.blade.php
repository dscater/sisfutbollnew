@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-white-50">Equipos</h1>
        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('equipos.create') }}">Nuevo</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped mt-1 data-table">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Logo</th>
                                    <th style="color:#fff;">Presidente</th>
                                    <th style="color:#fff;">Uniforme</th>
                                    <th style="color:#fff;">Teléfono</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Categoría</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($equipos as $equip)
                                        <tr>
                                            <td>{{ $equip->id }}</td>
                                            <td>{{ $equip->name }}</td>
                                            <td><img src="{{ asset($equip->logo) }}" alt="{{ $equip->logo }}"
                                                    class="img-fluid" width="120" height="120"></td>
                                            <td>{{ $equip->presidente }}</td>
                                            <td>Camiseta: {{ $equip->color_camiseta }} <br>
                                                Pantalon: {{ $equip->color_pantalo }}<br>
                                                Medias: {{ $equip->color_medias }}
                                            </td>
                                            <td>{{ $equip->celular }}</td>
                                            <td>{{ $equip->estado }}</td>
                                            <td>{{ $categoria[$equip->categoria_id] }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-block mb-1"
                                                    href="{{ route('equipos.edit', $equip->id) }}">Ver y/o Editar</a>

                                                {!! Form::open(['method' => 'DELETE', 'route' => ['equipos.destroy', $equip->id], 'style' => 'display:inline']) !!}
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
