@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-blue-50">Tablero de Posiciones por Campeonato.</h1>
        {{-- <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('tabposicion.buscar') }}">
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
        </div> --}}
        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        {{-- <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('tabposicion.actulizar', $id) }}">Actualizar Tabla</a>
                        </div> --}}
                        <div class="card-body">
                            <table class="table table-striped mt-1 data-table">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro</th>
                                    <th style="color:#fff;">Campeonato</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($campeonatos as $campeonato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $campeonato->nombre }}</td>
                                            <td>

                                                <a class="btn btn-success btn-block mb-1"
                                                    href="{{ route('tabposicion.detalle', $campeonato->id) }}">Detalles</a>
                                                <a href="{{ route('download-pdf', $campeonato->id) }}" target="_blank"
                                                    class="btn btn-info"><i class="nav-icon fas fa-download"></i> Reporte
                                                    PDF</a>
                                                {{-- @if ($i == 1)<a class="btn btn-success btn-block mb-1" href="\">1^</a>@endif
                                                @if ($i == 2)<a class="btn btn-success btn-block mb-1" href="\">2^</a>@endif
                                                @if ($i == $cantidad - 1)<a class="btn btn-danger btn-block mb-1"href="\">Penultimo</a>@endif
                                                @if ($i == $cantidad)<a class="btn btn-danger btn-block mb-1"href="\">Ultimo</a>@endif --}}
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
