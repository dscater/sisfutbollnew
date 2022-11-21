@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-blue-50">Jugadores</h1>
        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('jugadores.create') }}">Nuevo</a>

                            <table class="table table-striped mt-1">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Foto</th>
                                    <th style="color:#fff;">CI</th>
                                    <th style="color:#fff;">CI_Exp</th>
                                    <th style="color:#fff;">Nro Casaca</th>
                                    <th style="color:#fff;">Equipo</th>
                                    <th style="color:#fff;">Acciones</th>


                                </thead>
                                <tbody>
                                    @foreach ($jugadores as $jugador)


                                        <tr>
                                            <td>{{ $jugador->id }}</td>
                                            <td>{{ $jugador->nom}}
                                                {{ $jugador->apep}}
                                                {{ $jugador->apem}}
                                            </td>
                                            <td><img src="{{ asset($jugador->foto) }}" alt="{{ $jugador->foto }}" class="img-fluid" width="120" height="120"></td>
                                            <td>{{ $jugador->ci }}</td>
                                            <td>{{ $jugador->ci_exp }}</td>
                                            <td>{{ $jugador->nro_casaca }}</td>
                                            <td>{{ $equipos[$jugador->equipoclub_id] }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('jugadores.edit', $jugador->id)}}">Ver y/o Editar</a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['jugadores.destroy', $jugador->id],'style'=>'display:inline']) !!}
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
