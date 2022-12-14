@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-success-50">Reportes - Tarjeta de jugador</h1>

        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            {!! Form::open(['route' => 'reportes.tarjeta_jugador_pdf', 'method' => 'get', 'target' => '_blank']) !!}
                            <div class="row">
                                <div class="form-group col-md-6 ml-auto mr-auto">
                                    <label>Buscar por:</label>
                                    {{ Form::select('filtro', ['' => 'Seleccione...', 'id' => 'NRO. REGISTRO', 'ci' => 'C.I.', 'nom' => 'NOMBRE'], null, ['class' => 'form-control', 'required', 'id' => 'filtro']) }}
                                    <input type="text" class="form-control mt-2 d-none" id="valor"
                                        placeholder="Escribe para buscar...">

                                    <input type="text" name="txtJugador" id="txtJugador" class="form-control mt-2"
                                        value="" readonly placeholder="Jugador" required>
                                    <input type="hidden" name="jugador_id" id="jugador_id" value="0">

                                    <button class="btn btn-primary btn-block btn-flat mt-2">Generar reporte</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="{{ route('jugadores.getJugador') }}" id="urlGetJugador">
@endsection

@section('third_party_scripts')
    <script>
        let filtro = $("#filtro");
        let valor = $("#valor");
        let txtJugador = $("#txtJugador");
        let jugador_id = $("#jugador_id");

        $(document).ready(function() {
            filtro.change(function() {
                valor.val("");
                txtJugador.val("");
                jugador_id.val("");
                let val = filtro.val();
                if (val != '') {
                    valor.removeClass("d-none");
                } else {
                    valor.addClass("d-none");
                }
            });

            valor.on("change keyup", function() {
                getRegistro();
            });
        });

        function getRegistro() {
            if (filtro.val() != '' && valor.val() != '') {
                $.ajax({
                    type: "GET",
                    url: $("#urlGetJugador").val(),
                    data: {
                        filtro: filtro.val(),
                        valor: valor.val(),
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.id) {
                            jugador_id.val(response.id);
                            txtJugador.val(response.full_name);
                            txtJugador.prop("placeholder", "Jugador");
                        } else {
                            jugador_id.val("0");
                            txtJugador.val("");
                            txtJugador.prop("placeholder", "No se encontró ningun registro con ese valor");
                        }
                    }
                });
            } else {
                jugador_id.val("0");
                txtJugador.val("");
            }
        }
    </script>
@endsection
