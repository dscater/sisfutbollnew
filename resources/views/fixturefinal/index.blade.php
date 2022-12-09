@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-blue-50">Fixture Finales</h1>

        <div class="section-body">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('fixturefinal.buscador') }}">
                        <div class="form-row">
                            <div class="col-sm-4 my-1">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    @if ($id == 0)
                                        <h3>seleccione un campeonato</h3>
                                    @endif
                                    <h4>Campeonatos</h4>
                                    <div class="form-group">
                                        {!! Form::select('campeonato_id', $campeonato, isset($_GET['campeonato_id']) ? $_GET['campeonato_id'] : null, [
                                            'class' => 'form-control',
                                        ]) !!}
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
        </div>
        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-body">
                            @if (isset($o_campeonato) && $o_campeonato->serie == 'SERIE 1')
                                @include('fixturefinal.parcial.serie1')
                            @endif
                            @if (isset($o_campeonato) && $o_campeonato->serie == 'SERIE 2')
                                @include('fixturefinal.parcial.serie2')
                            @endif
                            @if (isset($o_campeonato) && $o_campeonato->serie == 'SERIE 3')
                                @include('fixturefinal.parcial.serie3')
                            @endif
                            @if (isset($o_campeonato) && $o_campeonato->serie == 'SERIE 6')
                                @include('fixturefinal.parcial.serie6')
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
