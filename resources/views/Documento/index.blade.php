@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-dark">Documentos</h1>

        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('documento.create') }}">Nuevo</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped mt-1 data-table">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro.</th>
                                    <th style="color:#fff;">Título</th>
                                    <th style="color:#fff;">Contenido</th>
                                    <th style="color:#fff;">Descripción</th>
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