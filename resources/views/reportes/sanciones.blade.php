@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-success-50">Reportes - Sanciones</h1>

        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            {!! Form::open(['route' => 'reportes.sanciones_pdf', 'method' => 'get', 'target' => '_blank']) !!}
                            <div class="row">
                                <div class="form-group col-md-6 offset-md-3">
                                    <label>Seleccione campeonato</label>
                                    {{ Form::select('campeonato_id', $array_campeonatos, null, ['class' => 'form-control', 'required', 'id' => 'campeonato_id']) }}
                                </div>
                                <div class="form-group col-md-6 offset-md-3">
                                    <label>Seleccione equipo</label>
                                    {{ Form::select('equipo_id', [], null, ['class' => 'form-control', 'required', 'id' => 'equipo_id']) }}
                                    <button class="btn btn-primary btn-block btn-flat mt-3">Generar reporte</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <input type="hidden" value="{{ route('equipos_campeonato') }}" id="url_equipos_campeonato">
@endsection

@section('third_party_scripts')
    <script>
        let campeonato_id = $("#campeonato_id");
        let equipo_id = $("#equipo_id");
        campeonato_id.change(getEquiposCampeonato);

        function getEquiposCampeonato() {
            equipo_id.html("");
            if (campeonato_id.val() != '') {
                $.ajax({
                    type: "get",
                    url: $("#url_equipos_campeonato").val(),
                    data: {
                        id: campeonato_id.val()
                    },
                    dataType: "json",
                    success: function(response) {
                        equipo_id.html(response);
                    }
                });
            }
        }
    </script>
@endsection
