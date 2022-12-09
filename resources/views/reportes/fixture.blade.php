@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-success-50">Reportes - Fixture</h1>

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
