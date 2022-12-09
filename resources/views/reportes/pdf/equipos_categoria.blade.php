<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>EquiposCategoría</title>
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
            width: 30px;
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
        <h4 class="texto">LISTA DE EQUIPOS POR CATEGORÍA</h4>
        <h4 class="fecha">Expedido: {{ date('d-m-Y') }}</h4>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th width="2%">N°</th>
                <th>NOMBRE</th>
                <th>LOGO</th>
                <th>FECHA FUNDACIÓN</th>
                <th>PRESIDENTE</th>
                <th>VICEPRESIDENTE</th>
                <th>COLOR DE CAMISETA</th>
                <th>COLOR PANTALÓN</th>
                <th>COLOR MEDIAS</th>
                <th>DIRECCIÓN</th>
                <th>CELULAR</th>
                <th>EMAIL</th>
                <th>OBSERVACIÓN</th>
                <th>ESTADO</th>
                <th>CATEGORÍA</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cont = 1;
            @endphp
            @foreach ($equipos as $value)
                <tr>
                    <td>{{ $cont++ }}</td>
                    <td>{{$value->name}}</td>
                    <td class="img_celda">
                        <img src="{{asset($value->logo)}}" alt="">
                    </td>
                    <td>{{$value->fecha_fund}}</td>
                    <td>{{$value->presidente}}</td>
                    <td>{{$value->vicepresidente}}</td>
                    <td>{{$value->color_camiseta}}</td>
                    <td>{{$value->color_pantalo}}</td>
                    <td>{{$value->color_medias}}</td>
                    <td>{{$value->direccion}}</td>
                    <td>{{$value->celular}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->observacion}}</td>
                    <td>{{$value->estado}}</td>
                    <td>{{$value->categoria->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
