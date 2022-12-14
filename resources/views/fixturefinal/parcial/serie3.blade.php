@if ($id != 0)
    <div class="row">
        <div class="col-md-12">
            <h4 style="background-color:#6777ef" class="w-100 text-center text-white p-1">
                CLASIFICATORIAS</h4>
        </div>
        @if (count($clasificatorias) > 0)
            @foreach ($clasificatorias as $value)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <u><strong>GRUPO: {{ $value->grupo }}</strong></u><br>
                            <p class="mb-1"><strong>{{ date('d/m/Y', strtotime($value->fecha_Par)) }}</strong></p>
                            <p class="mb-1"><strong>{{ date('H:i a', strtotime($value->hora)) }}</strong></p>
                            <span class="text-lg">{{ $equipo[$value->equipoA_id] }}</span>
                            <div class="font-weight-bold">VS</div>
                            <span class="text-lg">{{ $equipo[$value->equipoB_id] }}</span><br />
                            @if ($value->estado != null && $value->estado == 1)
                                <span class="badge badge-success">TERMINADO</span>
                            @else
                                <small><i>PENDIENTE</i></small>
                            @endif
                            <br />
                            @if (Auth::check())
                                <a class="btn btn-primary" href="{{ route('partidos.edit', $value->id) }}">Ver y/o
                                    Editar</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($clasificatorias) == count($partidos_terminados_clasificatorias))
                <div class="col-md-12">
                    @if (Auth::check())
                        <a class="btn btn-success btn-block btn-flat"
                            href="{{ route('partidos.generar_cuartos', $id) }}">GENERAR CUARTOS DE
                            FINAL</a>
                    @endif
                </div>
            @endif
        @else
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center">SIN PARTIDOS PROGRAMADOS</div>
                </div>
            </div>
        @endif
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <h4 style="background-color:#6777ef" class="w-100 text-center text-white p-1">
                CUARTOS DE FINAL</h4>
        </div>
        @if (count($cuartos) > 0)
            @foreach ($cuartos as $value)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <p class="mb-1"><strong>{{ date('d/m/Y', strtotime($value->fecha_Par)) }}</strong></p>
                            <p class="mb-1"><strong>{{ date('H:i a', strtotime($value->hora)) }}</strong></p>
                            {{ $equipo[$value->equipoA_id] }}
                            <div class="font-weight-bold">VS</div>
                            {{ $equipo[$value->equipoB_id] }}<br />
                            @if ($value->estado != null && $value->estado == 1)
                                <span class="badge badge-success">TERMINADO</span>
                            @else
                                <small><i>PENDIENTE</i></small>
                            @endif
                            <br />
                            @if (Auth::check())
                                <a class="btn btn-primary" href="{{ route('partidos.edit', $value->id) }}">Ver y/o
                                    Editar</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($cuartos_completos) == count($cuartos))
                <div class="col-md-12">
                    @if (Auth::check())
                        <a class="btn btn-success btn-block btn-flat"
                            href="{{ route('partidos.semifinal', $id) }}">GENERAR
                            PARTIDOS DE
                            SEMIFINAL</a>
                    @endif
                </div>
            @endif
        @else
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        SIN PARTIDOS PROGRAMADOS
                    </div>
                </div>
            </div>
        @endif
    </div>
    <table class="table table-striped mt-1">
        <tbody>
            <tr>
                <td style="background-color:#6777ef" class="text-center text-white">
                    SEMIFINALES</td>
            </tr>
            @if (count($semifinales) > 0)
                @foreach ($semifinales as $value)
                    <tr>
                        <td class="text-center">
                            <p class="mb-1"><strong>{{ date('d/m/Y', strtotime($value->fecha_Par)) }}</strong></p>
                            <p class="mb-1"><strong>{{ date('H:i a', strtotime($value->hora)) }}</strong></p>
                            {{ $equipo[$value->equipoA_id] }}
                            <h4>VS</h4>
                            {{ $equipo[$value->equipoB_id] }}<br />
                            @if ($value->estado != null && $value->estado == 1)
                                <span class="badge badge-success">TERMINADO</span>
                            @else
                                <small><i>PENDIENTE</i></small>
                            @endif
                            <br />
                            @if (Auth::check())
                                <a class="btn btn-primary" href="{{ route('partidos.edit', $value->id) }}">Ver y/o
                                    Editar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                @if (count($semifinales_completos) == count($semifinales))
                    <tr>
                        <td class="text-center">
                            @if (Auth::check())
                                <a class="btn btn-success" href="{{ route('partidos.final', $id) }}">GENERAR PARTIDO
                                    FINAL</a>
                            @endif

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
                    <td class="text-center">
                        <p class="mb-1"><strong>{{ date('d/m/Y', strtotime($final->fecha_Par)) }}</strong></p>
                        <p class="mb-1"><strong>{{ date('H:i a', strtotime($final->hora)) }}</strong></p>
                        {{ $equipo[$final->equipoA_id] }}
                        <h4>VS</h4>
                        {{ $equipo[$final->equipoB_id] }}<br />
                        @if ($final->estado != null && $final->estado == 1)
                            <span class="badge badge-success">TERMINADO</span>
                        @else
                            <small><i>PENDIENTE</i></small>
                        @endif
                        <br />
                        @if (Auth::check())
                            <a class="btn btn-primary" href="{{ route('partidos.edit', $final->id) }}">Ver y/o
                                Editar</a>
                        @endif
                    </td>
                </tr>
                @if ($final->estado == 1)
                    <tr>
                        <td class="text-center">
                            @if (Auth::check())
                                <a href="{{ route('partidodownload-pdf', $id) }}" target="_blank"
                                    class="btn btn-info"><i class="nav-icon fas fa-download"></i>
                                    Reporte PDF</a>
                            @endif
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
