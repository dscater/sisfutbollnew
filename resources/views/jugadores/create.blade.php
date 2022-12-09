@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">Nuevo Jugador</h1>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @php
                                
                            @endphp

                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::open(['route' => 'jugadores.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class="box-body">
                                @include("jugadores.form")
                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">crear</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
