<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Fixture</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,800&display=swap');

        * {
            font-family: sans-serif;
        }

        @page {
            margin-top: 0.5cm;
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
            border-bottom: solid 2px #037302;
            color: #037302;
            font-weight: normal;
            margin-bottom: 10px;
            text-align: center;
        }

        .logo img {
            position: absolute;
            width: 70px;
            top: 10px;
            left: 10px;
        }

        .titulo {
            width: 500px;
            margin: auto;
            margin-top: 15px;
            margin-bottom: 0px;
            text-align: center;
            font-size: 16pt;
            font-family: 'Open Sans', sans-serif;
            src: url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@1,800&display=swap');
        }

        .descripcion {
            width: 500px;
            text-align: center;
            margin: auto;
            font-weight: bold;
            font-size: 0.75em;
        }

        .texto {
            width: 250px;
            text-align: center;
            margin: auto;
            margin-top: 5px;
            font-weight: bold;
            font-size: 1.1em;
        }

        .fecha {
            width: 250px;
            text-align: center;
            margin: auto;
            margin-top: 0px;
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
            background: rgb(135, 206, 234)
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
        <img src="{{ asset('imagenes/titulo.png') }}" class="titulo" alt="Titulo">
        <h4 class="descripcion">Fundado el 30 de Julio de 1957 - Personería Jurídica N° 145778<br>Teléfonos: 2380996 -
            2394015</h4>
    </div>
    <h4 class="texto">FIXTURE</h4>
    <h4 class="texto">{{ $o_campeonato->nombre }}</h4>
    <h4 class="fecha">Expedido: {{ date('d-m-Y') }}</h4>
    @if ($s_fecha != 'todos')
        <h4 class="fecha">Fecha de Partidos: {{ date('d-m-Y', strtotime($fecha)) }} </h4>
    @endif
