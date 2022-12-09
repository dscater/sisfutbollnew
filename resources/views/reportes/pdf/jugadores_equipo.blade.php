<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>JugadoresEquipo</title>
    <style type="text/css">
        * {
            font-family: sans-serif;
        }

        @page {
            margin-top: 2cm;
            margin-bottom: 1cm;
            margin-left: 1.5cm;
            margin-right: 1cm;
            border: 5px solid blue;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top: 20px;
        }

        table thead tr th,
        tbody tr td {
            font-size: 0.63em;
            word-wrap: break-word;
        }

        .encabezado {
            width: 100%;
        }

        .logo img {
            position: absolute;
            width: 90px;
            top: -20px;
            left: 10px;
        }

        h2.titulo {
            width: 450px;
            margin: auto;
            margin-top: 15px;
            margin-bottom: 15px;
            text-align: center;
            font-size: 14pt;
        }

        .texto {
            width: 250px;
            text-align: center;
            margin: auto;
            margin-top: 15px;
            font-weight: bold;
            font-size: 1.1em;
        }

        .fecha {
            width: 250px;
            text-align: center;
            margin: auto;
            margin-top: 15px;
            font-weight: normal;
            font-size: 0.85em;
        }

        .total {
            text-align: right;
            padding-right: 15px;
            font-weight: bold;
        }

        table {
            width: 100%;
        }

        table thead {
            background: rgb(236, 236, 236)
        }

        table thead tr th {
            padding: 3px;
            font-size: 0.7em;
        }

        table tbody tr td {
            padding: 3px;
            font-size: 0.55em;
        }

        table tbody tr td.franco {
            background: red;
            color: white;
        }

        .centreado {
            padding-left: 0px;
            text-align: center;
        }

        .datos {
            margin-left: 15px;
            border-top: solid 1px;
            border-collapse: collapse;
            width: 250px;
        }

        .txt {
            font-weight: bold;
            text-align: right;
            padding-right: 5px;
        }

        .txt_center {
            font-weight: bold;
            text-align: center;
        }

        .cumplimiento {
            position: absolute;
            width: 150px;
            right: 0px;
            top: 86px;
        }

        .p_cump {
            color: red;
            font-size: 1.2em;
        }

        .b_top {
            border-top: solid 1px black;
        }

        .gray {
            background: rgb(202, 202, 202);
        }

        .bold {
            font-weight: bold;
        }

        .img_celda img {
            width: 40px;
        }
    </style>
</head>

<body>
    <div class="encabezado">
        <div class="logo">
            <img src="escudo.jpg" alt="escudo">
        </div>
        <h2 class="titulo">
            LIGA DEPORTIVA "EL TEJAR"
        </h2>
        <h4 class="texto">LISTA DE JUGADORES POR EQUIPOS</h4>
        <h4 class="texto">{{ $equipo->name }}</h4>
        <h4 class="fecha">Expedido: {{ date('d-m-Y') }}</h4>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th width="2%">N°</th>
                <th>PATERNO</th>
                <th>MATERNO</th>
                <th>NOMBRE</th>
                <th>C.I.</th>
                <th>FECHA NACIMIENTO</th>
                <th>LUGAR NACIMIENTO</th>
                <th>NACIONALIDAD</th>
                <th>NRO. CASACA</th>
                <th>FECHA AFILIACIÓN</th>
                <th>FOTO</th>
                <th>OBSERVACIÓN</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cont = 1;
            @endphp
            @foreach ($jugadores as $value)
                <tr>
                    <td>{{ $cont++ }}</td>
                    <td>{{ $value->nom }}</td>
                    <td>{{ $value->apep }}</td>
                    <td>{{ $value->apem }}</td>
                    <td>{{ $value->ci }} {{$value->ci_exp}}</td>
                    <td>{{ $value->fecha_nac }}</td>
                    <td>{{ $value->lugar_nac }}</td>
                    <td>{{ $value->nacionalidad }}</td>
                    <td>{{ $value->nro_casaca }}</td>
                    <td>{{ $value->fecha_afi }}</td>
                    <td class="img_celda centreado">
                        <img src="{{ asset($value->foto) }}" alt="">
                    </td>
                    <td>{{ $value->observacion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
