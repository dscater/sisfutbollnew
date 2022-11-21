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

        <h5 class=" font-weight-bold center ">Tabla de Posiciones de:  {{ $campeonato[$idf] }}</h5>
        <table class="table table-bordered mt-5">
            <thead style="background-color:#6777ef">
                <th style="color:#fff;">Nro</th>
                <th style="color:#fff;">Campeonato</th>
                <th style="color:#fff;">Equipo</th>

                <th style="color:#fff;">Ptos</th>
                <th style="color:#fff;">Pj</th>
                <th style="color:#fff;">Pg</th>
                <th style="color:#fff;">Pp</th>
                <th style="color:#fff;">Pe</th>
                <th style="color:#fff;">Gf</th>
                <th style="color:#fff;">Gc</th>
                <th style="color:#fff;">GD</th>

            </thead>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @forelse ($tabla as $filla)
                <tr>
                    <td>{{ ++$i}}</td>
                    <td>{{ $campeonato[$filla->campeonato_id] }}</td>
                    <td>{{ $equipo[$filla->equipo_id] }}</td>
                    <td>{{ $filla->puntos }}</td>
                    <td>{{ $filla->Pj }}</td>
                    <td>{{ $filla->Pg }}</td>
                    <td>{{ $filla->Pp }}</td>
                    <td>{{ $filla->Pe }}</td>
                    <td>{{ $filla->Gf }}</td>
                    <td>{{ $filla->Gc }}</td>
                    <td>{{ $filla->GD }}</td>

                </tr>
                @empty

                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
