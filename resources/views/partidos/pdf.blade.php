<!doctype html>
<html lang="en">

<head>
    <title>SisFut</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        table {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <div style="display:inline-block;vertical-align:top;">
            <img src="escudo.jpg" alt="escudo" width="120" height="170">
        </div>
        <div style="display:inline-block;">
            <h4 class="text-success text-center"> LIGA DEPORTIVA "EL TEJAR"</h4>
            <p class="text-success text-center"> Fundacion 30 de julio de 1957</p>
            <p class="text-success text-center"> Personeria Juridica No 145778</p>
            <p class="text-success text-center"> Telefonos 2380996 - 2394015</p>
        </div>

        <h5 class=" font-weight-bold center ">Reporte de:  {{ $campeonato[$idf] }}</h5>
        <table class="table table-bordered mt-5">
            <thead style="background-color:#6777ef">
                <th style="color:#fff;">Nro</th>
                <th style="color:#fff;">Campeonato</th>
                <th style="color:#fff;">Equipos Inscritos</th>
                <th style="color:#fff;"></th>

            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @forelse ($Inscrip as $filla)
                <tr>
                    <td>{{ ++$i}}</td>
                    <td>{{ $campeonato[$filla->campeonato_id] }}</td>
                    <td>{{ $equipo[$filla->equipo_id] }}</td>
                    @if ($filla->equipo_id === $pfinal)
                        <td><h4 class="text-success">Ganador</h4></td>
                    @endif
                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
        <h5>Partido Final</h5>
        <table>
            <thead style="background-color:#6777ef">
                <th style="color:#fff;">{{ $equipo[$partido->equipoA_id] }}</th>
                <th style="color:#fff;">- VS -</th>
                <th style="color:#fff;">{{ $equipo[$partido->equipoB_id] }}</th>
            </thead>
        </table>
    </div>
</body>

</html>
