@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-blue-50">Inscribir</h1>

        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('inscripcion.create', $id) }}">Inscribir equipo</a><br>
                            <h4>Partidos Eliminatoria Todos vs Todos (TvsT): {{ $comb }}</h4>
                            <h4>Partidos Eliminatoria Ida y Vuelta (I y V): {{ $comb*2 }}</h4>
                            <table class="table table-striped mt-1">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro</th>
                                    <th style="color:#fff;">Campeonato</th>
                                    <th style="color:#fff;">Equipo</th>
                                    <th style="color:#fff;">Categoria</th>
                                    <th style="color:#fff;">Observacion</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @php
                                        $i=0;
                                    @endphp
                                    @foreach ($inscrip as $inscri)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $campeonatos[$inscri->campeonato_id] }}</td>
                                            <td>{{ $equipos[$inscri->equipo_id] }}</td>
                                            <td>{{ $categorias[$equiposca[$inscri->equipo_id]] }}</td>
                                            <td>{{ $inscri->observacion }}</td>

                                            <td>

                                                {!! Form::open(['method' => 'DELETE','route' => ['inscripcion.destroy', $inscri->id],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Borrar', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
