@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-success-50">Categorías</h1>

        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('categorias.create') }}">Nuevo</a>
                        </div>
                        <div class="card-body">
                            @if (session('error'))
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <span class="badge badge-danger">{{ session('error') }}</span>
                                </div>
                            @endif

                            <table class="table table-striped mt-1 data-table">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($categorias as $not)
                                        <tr>
                                            <td>{{ $not->id }}</td>
                                            <td>{{ $not->name }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-block mb-1"
                                                    href="{{ route('categorias.edit', $not->id) }}">Ver y/o Editar</a>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['categorias.destroy', $not->id], 'style' => 'display:inline']) !!}
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
            columns: [{
                    width: "10%"
                },
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
