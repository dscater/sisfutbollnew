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
                                    <label>Seleccione Jugador</label>
                                    {{ Form::select('jugador_id', $array_jugadores, null, ['class' => 'form-control', 'required']) }}
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
@endsection

@section('third_party_scripts')
    <script></script>
@endsection
