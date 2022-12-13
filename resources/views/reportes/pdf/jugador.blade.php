<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Jugador</title>
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
            width: 100%;
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
        <h4 class="texto">REPORTE DE JUGADOR</h4>
        <h4 class="fecha">Expedido: {{ date('d-m-Y') }}</h4>
    </div>
    <table border="1">
        <tbody>
            <tr>
                <td class="bold" width="15%">Nombre:</td>
                <td width="60%">{{ $jugador->nom }}</td>
                <td class="img_celda"rowspan="8" colspan="2">
                    <img src="{{ asset($jugador->foto) }}" alt="Foto">
                </td>
            </tr>
            <tr>
                <td class="bold">Ap. paterno:</td>
                <td>{{ $jugador->apep }}</td>
            </tr>
            <tr>
                <td class="bold">Ap. materno:</td>
                <td>{{ $jugador->apem }}</td>
            </tr>
            <tr>
                <td class="bold">Fecha de nac.:</td>
                <td>{{ $jugador->fecha_nac }}</td>
            </tr>
            <tr>
                <td class="bold">Lugar de nac.:</td>
                <td>{{ $jugador->lugar_nac }}</td>
            </tr>
            <tr>
                <td class="bold">Nacionalidad:</td>
                <td>{{ $jugador->nacionalidad }}</td>
            </tr>

            <tr>
                <td class="bold">Nro. casaca:</td>
                <td>{{ $jugador->nro_casaca }}</td>
            </tr>
            <tr>
                <td class="bold">Fecha de afiliación:</td>
                <td>{{ $jugador->fecha_afi }}</td>
            </tr>
            <tr>
                <td class="bold">Equipo:</td>
                <td>{{ $jugador->equipoclub->name }}</td>
                <td class="bold" width="6%">C.I.:</td>
                <td>{{ $jugador->ci }} {{ $jugador->ci_exp }}</td>
            </tr>
            <tr>
                <td class="bold">Observación:</td>
                <td colspan="3">{{ $jugador->observacion }}</td>
            </tr>
        </tbody>
    </table>

    <h4>Equipos anteriores</h4>
    <table border="1">
        <thead>
            <tr>
                <th width="4%">N°</th>
                <th>Equipo</th>
                <th width="6%">Año</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cont = 1;
            @endphp
            @foreach ($jugador->equipos as $equipo)
                <tr>
                    <td>{{ $cont++ }}</td>
                    <td>{{ $equipo->equipo }}</td>
                    <td class="centreado">{{ $equipo->anio }}</td>
                    <td>{{ $equipo->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
