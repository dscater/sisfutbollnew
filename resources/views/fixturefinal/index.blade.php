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
                                    {!! Form::select('campeonato_id', $campeonato ,null, array('class' => 'form-control')) !!}
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
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;"></th>
                                    <th style="color:#fff;"></th>
                                    <th style="color:#fff;">Partidos de finales</th>
                                    <th style="color:#fff;"></th>
                                    <th style="color:#fff;"></th>
                                    <th style="color:#fff;"></th>

                                </thead>
                                <tbody>
                                    @if(($partido1->tipo == 3 && $partido2->tipo == 3 && $partido3->tipo == 3) || ($partido1->tipo == 2 && $partido2->tipo == 2))
                                        <tr>
                                            <td>{{ $equipo[$partido1->equipoA_id] }}
                                                <h4>VS</h4>
                                                {{ $equipo[$partido1->equipoB_id] }}
                                                <a class="btn btn-primary" href="{{ route('partidos.edit', $partido1->id)}}">Ver y/o Editar</a>
                                            </td>
                                            <td>_________________</td>
                                            <td>
                                                {{ $equipo[$partido2->equipoA_id] }}
                                                <h4>VS</h4>
                                                {{ $equipo[$partido2->equipoB_id] }}
                                                <a class="btn btn-primary" href="{{ route('partidos.edit', $partido2->id)}}">Ver y/o Editar</a>
                                            </td>
                                            <td>_________________</td>
                                            <td>
                                                {{ $equipo[$partido3->equipoA_id] }}
                                                <h4>VS</h4>
                                                {{ $equipo[$partido3->equipoB_id] }}
                                                <a class="btn btn-primary" href="{{ route('partidos.edit', $partido3->id)}}">Ver y/o Editar</a>
                                            </td>

                                            <td>
                                                @if ($partido1->estado == 1 && $partido2->estado == 1 && $partido3->estado == 1)
                                                    <a class="btn btn-success" href="{{ route('partidos.semifinal', $id) }}">Generar Sig. Partidos</a>
                                                @endif


                                            </td>
                                        </tr>
                                    @endif
                                    @if ($partido4 === null)

                                    @else
                                        @if ($partido4->tipo == 2 && $partido5->tipo == 2 )
                                            <tr>
                                                <td>

                                                </td>
                                                <td>{{ $equipo[$partido4->equipoA_id] }}
                                                    <h4>VS</h4>
                                                    {{ $equipo[$partido4->equipoB_id] }}
                                                    <a class="btn btn-primary" href="{{ route('partidos.edit', $partido4->id)}}">Ver y/o Editar</a>
                                                </td>

                                                <td>_________________</td>
                                                <td>{{ $equipo[$partido5->equipoA_id] }}
                                                    <h4>VS</h4>
                                                    {{ $equipo[$partido5->equipoB_id] }}
                                                    <a class="btn btn-primary" href="{{ route('partidos.edit', $partido5->id)}}">Ver y/o Editar</a>
                                                </td>

                                                <td>


                                                </td>

                                                <td>
                                                    @if ($partido4->estado == 1 && $partido5->estado == 1)
                                                    <a class="btn btn-success" href="{{ route('partidos.final', $id) }}">Generar Final</a>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                    @if ($partido6 === null)
                                    @else
                                        @if ($partido6->tipo == 0)
                                        <tr>
                                            <td>

                                            </td>
                                            <td></td>
                                            <td>{{ $equipo[$partido6->equipoA_id] }}
                                                <h4>VS</h4>
                                                {{ $equipo[$partido6->equipoB_id] }}
                                                <a class="btn btn-primary" href="{{ route('partidos.edit', $partido6->id)}}">Ver y/o Editar</a>
                                            </td>

                                            <td></td>
                                            <td>


                                            </td>

                                            <td>
                                                @if ($partido6->estado == 1)
                                                    <h3 class="text-danger">Termino</h3>
                                                    <a href="{{ route('partidodownload-pdf', $id) }}" class="btn btn-info"><i class="nav-icon fas fa-download"></i>  Report PDF</a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
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
