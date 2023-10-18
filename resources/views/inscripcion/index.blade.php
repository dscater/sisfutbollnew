@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-dark">Inscribir</h1>

        <div>
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <a class="btn btn-warning" href="{{ route('inscripcion.create', $id) }}">Inscribir equipo</a>
                        </div>
                        <div class="card-body">
                            {{-- <div class="row">
                                <div class="col-md-12">
                                    <h4>Partidos Eliminatoria Todos vs Todos (TvsT): {{ $comb }}</h4>
                                    <h4>Partidos Eliminatoria Ida y Vuelta (I y V): {{ $comb * 2 }}</h4>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <a class="btn btn-success mb-1 btn-block"
                                        href="{{ route('partidos.generar', $id) }}?sw=tt">Generar Todos vs Todos</a>
                                </div>
                                <div class="col-md-6">
                                    <a class="btn btn-success mb-1 btn-block"
                                        href="{{ route('partidos.generar', $id) }}?sw=iv">Generar Ida y Vuelta</a>
                                </div>
                            </div>
                            @if (session('info'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning">
                                            <button class="close" data-dismiss="alert">&times;</button>
                                            <strong><i class="fa fa-exclamation-triangle"></i>
                                                {{ session('info') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (session('bien'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-success">
                                            <button class="close" data-dismiss="alert">&times;</button>
                                            <strong><i class="fa fa-check-circle"></i>
                                                {{ session('bien') }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <table class="table table-striped mt-1 data-table">
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
                                        $i = 0;
                                    @endphp
                                    @foreach ($inscrip as $inscri)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $campeonatos[$inscri->campeonato_id] }}</td>
                                            <td>{{ $equipos[$inscri->equipo_id] }}</td>
                                            <td>{{ $categorias[$equiposca[$inscri->equipo_id]] }}</td>
                                            <td>{{ $inscri->observacion }}</td>

                                            <td>

                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['inscripcion.destroy', $inscri->id],
                                                    'style' => 'display:inline',
                                                ]) !!}
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
    @if (session('variaciones'))
        @include('modal.modal_generacion')
    @endif
@endsection
@section('third_party_scripts')
    <script>
        $('table.data-table').DataTable({
            columns: [
                null,
                null,
                null,
                null,
                null,
                {
                    width: "10%"
                },
            ],
            scrollCollapse: true,
            language: lenguaje,
            pageLength: 25
        });
    </script>
@endsection
