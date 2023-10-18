@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-dark">Reportes - Fixture</h1>

        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            {!! Form::open(['route' => 'reportes.fixture_pdf', 'method' => 'get', 'target' => '_blank']) !!}
                            <div class="row">
                                <div class="form-group col-md-6 offset-md-3">
                                    <label>Seleccione campeonato</label>
                                    {{ Form::select('campeonato_id', $array_campeonatos, null, ['class' => 'form-control', 'required', 'id' => 'campeonato_id']) }}
                                </div>
                                <div class="form-group col-md-6 offset-md-3">
                                    <label>Filtrar Fecha:</label>
                                    {{ Form::select('s_fecha', ['todos' => 'Todos', 'fecha' => 'Seleccionar Fecha'], null, ['class' => 'form-control', 'required', 'id' => 's_fecha']) }}
                                </div>
                                <div class="form-group col-md-6 offset-md-3" id="contenedor_fecha">
                                    <label>Elegir fecha:</label>
                                    {{ Form::date('fecha', date('Y-m-d'), ['class' => 'form-control', 'required', 'id' => 'fecha']) }}
                                </div>
                                <button class="btn btn-primary btn-block btn-flat mt-3">Generar reporte</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('third_party_scripts')
    <script>
        $(document).ready(function() {
            $("#contenedor_fecha").hide();

            $("#s_fecha").change(function() {
                let val = $(this).val();
                if (val == 'todos') {
                    $("#contenedor_fecha").hide();
                } else {
                    $("#contenedor_fecha").show();
                }
            });
        });
    </script>
@endsection
