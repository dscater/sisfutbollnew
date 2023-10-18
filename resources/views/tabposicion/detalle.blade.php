@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-dark">Tablero de Posiciones por Campeonato</h1>
        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h4 class="w-100 text-center font-weight-bold">{{ $campeonato->nombre }}</h4>
                        </div>
                        <div class="card-body">
                            @if ($campeonato->serie == 'SERIE 1')
                                @include('tabposicion.parcial.serie1')
                            @endif
                            @if ($campeonato->serie == 'SERIE 2')
                                @include('tabposicion.parcial.serie2')
                            @endif
                            @if ($campeonato->serie == 'SERIE 3')
                                @include('tabposicion.parcial.serie3')
                            @endif
                            @if ($campeonato->serie == 'SERIE 6')
                                @include('tabposicion.parcial.serie6')
                            @endif
                            <a href="{{ route('tabposicion.index') }}" class="btn btn-default mt-2">Volver</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
