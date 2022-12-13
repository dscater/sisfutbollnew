<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Fixture</title>
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
        <h4 class="texto">FIXTURE</h4>
        <h4 class="texto">{{ $o_campeonato->nombre }}</h4>
        <h4 class="fecha">Expedido: {{ date('d-m-Y') }}</h4>
    </div>

    @if ($id != 0)
        <h4>CLASIFICATORIAS</h4>
        <table border="1">
            <thead>
                <tr>
                    <th width="10%">Fecha</th>
                    <th width="10%">Hora</th>
                    <th>Equipo 1</th>
                    <th width="8%"></th>
                    <th>Equipo 2</th>
                </tr>
            </thead>
            <tbody>
                @if (count($clasificatorias) > 0)
                    @foreach ($clasificatorias as $value)
                        <tr>
                            <td class="centreado">{{ date('d/m/Y', strtotime($value->fecha_Par)) }}</td>
                            <td class="centreado">{{ date('H:i a', strtotime($value->hora)) }}</td>
                            <td class="centreado">{{ $equipo[$value->equipoA_id] }}</td>
                            <td class="centreado">VS</td>
                            <td class="centreado">{{ $equipo[$value->equipoB_id] }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">SIN PARTIDOS PROGRAMADOS</td>
                    </tr>
                @endif
            </tbody>
        </table>
        @if (count($cuartos) > 0)
            <h4>CUARTOS DE FINAL</h4>
            <table border="1">
                <thead>
                    <tr>
                        <th width="10%">Fecha</th>
                        <th width="10%">Hora</th>
                        <th>Equipo 1</th>
                        <th width="8%"></th>
                        <th>Equipo 2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cuartos as $value)
                        <tr>
                            <td class="centreado">{{ date('d/m/Y', strtotime($value->fecha_Par)) }}</td>
                            <td class="centreado">{{ date('H:i a', strtotime($value->hora)) }}</td>
                            <td class="centreado">{{ $equipo[$value->equipoA_id] }}</td>
                            <td class="centreado">VS</td>
                            <td class="centreado">{{ $equipo[$value->equipoB_id] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if (count($semifinales) > 0)
            <h4>SEMIFINALES</h4>
            <table border="1">
                <thead>
                    <tr>
                        <th width="10%">Fecha</th>
                        <th width="10%">Hora</th>
                        <th>Equipo 1</th>
                        <th width="8%"></th>
                        <th>Equipo 2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($semifinales as $value)
                        <tr>
                            <td class="centreado">{{ date('d/m/Y', strtotime($value->fecha_Par)) }}</td>
                            <td class="centreado">{{ date('H:i a', strtotime($value->hora)) }}</td>
                            <td class="centreado">{{ $equipo[$value->equipoA_id] }}</td>
                            <td class="centreado">VS</td>
                            <td class="centreado">{{ $equipo[$value->equipoB_id] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        @if ($final)
            <h4>FINAL</h4>
            <table border="1">
                <thead>
                    <tr>
                        <th width="10%">Fecha</th>
                        <th width="10%">Hora</th>
                        <th>Equipo 1</th>
                        <th width="8%"></th>
                        <th>Equipo 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="centreado">{{ date('d/m/Y', strtotime($final->fecha_Par)) }}</td>
                        <td class="centreado">{{ date('H:i a', strtotime($final->hora)) }}</td>
                        <td class="centreado">{{ $equipo[$final->equipoA_id] }}</td>
                        <td class="centreado">VS</td>
                        <td class="centreado">{{ $equipo[$final->equipoB_id] }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
    @endif
</body>

</html>
