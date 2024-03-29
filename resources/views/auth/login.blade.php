<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<style>
    body {
        font-family: 'Nunito', sans-serif;
    }

    divf {
        background-image: url('fondo.jpg');
        background-repeat: no-repeat;
        background-size: 100% 100%;
    }

    diva {
        opacity: 0.89;
    }

    divb {
        opacity: 10;
    }
</style>

<body class="hold-transition login-page"
    style="background-image: url('fondo.jpg');background-repeat: no-repeat;background-size: cover;">
    <div class="login-box transpa-bg">
        <div class="login-logo">
            <a href="{{ url('/home') }}"><b class="text-white">* LIGA DEPORTIVA * "EL TEJAR"</b></a>
        </div>
        <!-- /.login-logo -->

        <!-- /.login-box-body -->
        <div class="card transpa-bg">
            <div class="card-body login-card-body transpa-bg">
                <p class="login-box-msg">Iniciar Sesión</p>

                <form method="post" action="{{ url('/login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Correo"
                            class="form-control @error('email') is-invalid @enderror" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                        @error('email')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" placeholder="Contraseña"
                            class="form-control @error('password') is-invalid @enderror">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success btn-block">Ingresar</button>
                        </div>
                    </div>
                </form>

                {{-- <a href="{{ route('register') }}" class="text-center d-block text-left mt-2 mb-0">Regitrarse</a> --}}
            </div>
            <!-- /.login-card-body -->
        </div>

    </div>
    <!-- /.login-box -->

    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
