@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-blue-50">Tablero de Posiciones por Campeonato.</h1>
        <div class="section-body">
            <div class="card">
              <div class="card-body">
                  <form action="{{ route('tabposicion.buscar') }}">
                    <div class="form-row">
                        <div class="col-sm-4 my-1">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <h4>Campeonatos</h4>
                                <div class="form-group">
                                    {!! Form::select('campeonato_id', $campeonato, $id, array('class' => 'form-control')) !!}
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

                            <a class="btn btn-warning" href="{{ route('tabposicion.actulizar', $id) }}">Actulizar Tabla</a>
                            <table class="table table-striped mt-1">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro</th>
                                    <th style="color:#fff;">Campeonato</th>
                                    <th style="color:#fff;">Equipo</th>
                                    <th style="color:#fff;">Walcover</th>
                                    <th style="color:#fff;">Ptos</th>
                                    <th style="color:#fff;">Pj</th>
                                    <th style="color:#fff;">Pg</th>
                                    <th style="color:#fff;">Pp</th>
                                    <th style="color:#fff;">Pe</th>
                                    <th style="color:#fff;">Gf</th>
                                    <th style="color:#fff;">Gc</th>
                                    <th style="color:#fff;">GD</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($posiciones as $posicion)

                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $campeonato[$posicion->campeonato_id] }}</td>
                                            <td>{{ $equipo[$posicion->equipo_id] }}</td>
                                            <td>{{ $posicion->walkover}}</td>
                                            <td>{{ $posicion->puntos }}</td>
                                            <td>{{ $posicion->Pj }}</td>
                                            <td>{{ $posicion->Pg }}</td>
                                            <td>{{ $posicion->Pp }}</td>
                                            <td>{{ $posicion->Pe }}</td>
                                            <td>{{ $posicion->Gf }}</td>
                                            <td>{{ $posicion->Gc }}</td>
                                            <td>{{ $posicion->GD }}</td>
                                            <td>

                                                <a class="btn btn-success" href="">Detalles</a>
                                                <a class="btn btn-primary" href="{{ route('equipos.edit', $posicion->equipo_id)}}">Ver y/o Editar</a>
                                                @if ($i == 1)
                                                    <a class="btn btn-success" href="\">1^</a>
                                                @endif
                                                @if ($i == 2)
                                                    <a class="btn btn-success" href="\">2^</a>
                                                @endif
                                                @if ($i == $cantidad-1)
                                                    <a class="btn btn-danger" href="\">Penultimo</a>
                                                @endif
                                                @if ($i == $cantidad)
                                                    <a class="btn btn-danger" href="\">Ultimo</a>
                                                @endif



                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if ($i<=5)

                            @else

                            <a class="btn btn-success float-right" href="{{ route('partidos.generarter', $id) }}">Generar Finales</a>
                            @endif
                            <a href="{{ route('download-pdf', $id) }}" class="btn btn-info"><i class="nav-icon fas fa-download"></i>  Report PDF</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
