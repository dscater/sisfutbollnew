<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!--link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @yield('third_party_stylesheets')
    <style>
        .navigation li {
            background: black;
        }
    </style>
    @stack('page_css')


    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('data-tables/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('data-tables/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('data-tables/datatables-fixedcolumns/css/fixedColumns.bootstrap4.css') }}">

</head>
<style>
    body {
        font-family: 'Nunito', sans-serif;

    }

    divf {
        background-image: url('{{asset('fondo.jpg')}}');
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }
</style>

<body class="font-sans antialiased"
    style="background-image: url('{{asset('fondo.jpg')}}');background-repeat: no-repeat;background-size: cover;">
    <div class="wrapper"
        style="background-image: url('{{asset('fondo.jpg')}}');background-repeat: no-repeat;background-size: cover;">
        <!-- Main Header -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link  btn btn-info" data-widget="pushmenu" href="#" role="button"
                        style="color:white;"><i class="fas fa-bars"></i> MENU</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <!--img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                         class="user-image img-circle elevation-2" alt="User Image"-->
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        {{-- <!-- User image -->
                        <li class="user-header bg-primary">
                            <!--img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
                             class="img-circle elevation-2"
                             alt="User Image"-->
                            <p>
                                {{ Auth::user()->name }}
                                <!--small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small-->
                            </p>
                        </li> --}}
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <!--a href="#" class="btn btn-default btn-flat">Profile</a-->
                            <a href="#" class="btn btn-default btn-block border-0"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"
            style="background-image: url('{{asset('fondo.jpg')}}');background-repeat: no-repeat;background-size: cover;">
            @yield('content')
        </div>

        <!-- Main Footer -->

    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- DataTables -->
    <script src="{{ asset('data-tables/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('data-tables/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('data-tables/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('data-tables/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('data-tables/datatables-fixedcolumns/js/dataTables.fixedColumns.js') }}"></script>
    <script src="{{ asset('data-tables/datatables-fixedcolumns/js/fixedColumns.bootstrap4.js') }}"></script>

    <script>
        lenguaje = {
            "decimal": "",
            "emptyTable": "No se encontraron registros",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
            "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
            "infoFiltered": "(Filtrado de _MAX_ total registros)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": '<i class="fa fa-fast-backward"></i>',
                "last": '<i class="fa fa-fast-forward"></i>',
                "next": '<i class="fa fa-step-forward"></i>',
                "previous": '<i class="fa fa-step-backward"></i>'
            }
        };
    </script>

    @yield('third_party_scripts')

    @stack('page_scripts')
</body>

</html>
