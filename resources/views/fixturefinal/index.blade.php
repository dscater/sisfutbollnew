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
                                        {!! Form::select('campeonato_id', $campeonato, null, ['class' => 'form-control']) !!}
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
                        <div class="card-header">
                            @if ($id != 0)


                                <table class="table table-striped mt-1">
                                    <tbody>
                                        <tr>
                                            <td style="background-color:#6777ef" class="text-center text-white">
                                                CLASIFICATORIAS</td>
                                        </tr>
                                        @if (count($clasificatorias) > 0)
                                            @foreach ($clasificatorias as $value)
                                                <tr>
                                                    <td class="text-center">
                                                        <span class="text-lg">{{ $equipo[$value->equipoA_id] }}</span>
                                                        <div class="font-weight-bold">VS</div>
                                                        <span class="text-lg">{{ $equipo[$value->equipoB_id] }}</span><br />
                                                        <small><i>{{$value->estado !=NULL && $value->estado == 1? 'TERMINADO':'PENDIENTE'}}</i></small>
                                                        <br/>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('partidos.edit', $value->id) }}">Ver y/o
                                                            Editar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center">SIN PARTIDOS PROGRAMADOS</td>
                                            </tr>
                                        @endif

                                        <tr>
                                            <td style="background-color:#6777ef" class="text-center text-white">
                                                CUARTOS DE FINAL</td>
                                        </tr>
                                        @if (count($cuartos) > 0)
                                            @foreach ($cuartos as $value)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $equipo[$value->equipoA_id] }}
                                                        <div class="font-weight-bold">VS</div>
                                                        {{ $equipo[$value->equipoB_id] }}<br />
                                                        <small><i>{{$value->estado !=NULL && $value->estado == 1? 'TERMINADO':'PENDIENTE'}}</i></small>
                                                        <br/>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('partidos.edit', $value->id) }}">Ver y/o
                                                            Editar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (count($cuartos_completos) == count($cuartos))
                                                <tr>
                                                    <td class="text-center">
                                                        <a class="btn btn-success"
                                                            href="{{ route('partidos.semifinal', $id) }}">Generar Sig.
                                                            Partidos</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @else
                                            <tr>
                                                <td class="text-center">SIN PARTIDOS PROGRAMADOS</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td style="background-color:#6777ef" class="text-center text-white">
                                                SEMIFINALES</td>
                                        </tr>
                                        @if (count($semifinales) > 0)
                                            @foreach ($semifinales as $value)
                                                <tr>
                                                    <td class="text-center">{{ $equipo[$value->equipoA_id] }}
                                                        <h4>VS</h4>
                                                        {{ $equipo[$value->equipoB_id] }}<br />
                                                        <small><i>{{$value->estado !=NULL && $value->estado == 1? 'TERMINADO':'PENDIENTE'}}</i></small>
                                                        <br/>
                                                        <a class="btn btn-primary"
                                                            href="{{ route('partidos.edit', $value->id) }}">Ver y/o
                                                            Editar</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if (count($semifinales_completos) == count($semifinales))
                                                <tr>
                                                    <td class="text-center">
                                                        <a class="btn btn-success"
                                                            href="{{ route('partidos.final', $id) }}">Generar
                                                            Final</a>

                                                    </td>
                                                </tr>
                                            @endif
                                        @else
                                            <tr>
                                                <td class="text-center">SIN PARTIDOS PROGRAMADOS</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td style="background-color:#6777ef" class="text-center text-white">
                                                FINAL</td>
                                        </tr>
                                        @if ($final)
                                            <tr>
                                                <td class="text-center">{{ $equipo[$final->equipoA_id] }}
                                                    <h4>VS</h4>
                                                    {{ $equipo[$final->equipoB_id] }}<br/>
                                                    <small><i>{{$final->estado !=NULL && $final->estado == 1? 'TERMINADO':'PENDIENTE'}}</i></small>
                                                    <br/>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('partidos.edit', $final->id) }}">Ver y/o
                                                        Editar</a>
                                                </td>
                                            </tr>
                                            @if ($final->estado == 1)
                                                <tr>
                                                    <td class="text-center">
                                                        <a href="{{ route('partidodownload-pdf', $id) }}" target="_blank"
                                                            class="btn btn-info"><i class="nav-icon fas fa-download"></i>
                                                            Reporte PDF</a>
                                                    </td>
                                                </tr>
                                            @endif
                                        @else
                                            <tr>
                                                <td class="text-center">SIN PARTIDOS PROGRAMADOS</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
