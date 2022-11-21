@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-white-50">Equipos</h1>
        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('equipos.create') }}">Nuevo</a>
                            <table class="table table-striped mt-1">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nro</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Logo</th>
                                    <th style="color:#fff;">Presidente</th>
                                    <th style="color:#fff;">Uniforme</th>
                                    <th style="color:#fff;">Telefono</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Categoria</th>
                                    <th style="color:#fff;">acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($equipos as $equip)


                                        <tr>
                                            <td>{{ $equip->id }}</td>
                                            <td>{{ $equip->name }}</td>
                                            <td ><img src="{{ asset($equip->logo) }}" alt="{{ $equip->logo }}" class="img-fluid" width="120" height="120"></td>
                                            <td>{{ $equip->presidente }}</td>
                                            <td>Camiseta: {{ $equip->color_camiseta }} <br>
                                                Pantalon: {{ $equip->color_pantalo }}<br>
                                                Medias: {{ $equip->color_medias }}
                                            </td>
                                            <td>{{ $equip->celular}}</td>
                                            <td>{{ $equip->estado }}</td>
                                            <td>{{ $categoria[$equip->categoria_id] }}</td>
                                            <td>
                                                <a class="btn btn-primary" href="{{ route('equipos.edit', $equip->id)}}">Ver y/o Editar</a>

                                                {!! Form::open(['method' => 'DELETE','route' => ['equipos.destroy', $equip->id],'style'=>'display:inline']) !!}
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
