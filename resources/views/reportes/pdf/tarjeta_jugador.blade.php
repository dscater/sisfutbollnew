<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TarjetaJugador</title>
    <style type="text/css">
    *{
        margin:0;
    }

    body{
        position: relative;
    }

    .contenedor_tarjeta{
        font-size: 0.8em;
        width: 10cm;
        height: 14cm;
        border:solid 4px #05A22C;
    }

    .celdas{
        border:solid 4px #05A22C;
        position: absolute;
        top:0;
        right: 0;
        width: 10cm;
        height: 14cm;
    }

    .info_tarjeta{
        width: 100%;
    }
    
    .nombre_empresa{
        font-size: 1.1em;
        font-weight: bold;
        text-align: center;
    }
    .lapaz_bol{
        margin-top: 0px;
        font-size: 0.8em;
        text-align: center;
    }
    
    .info_ p{
        padding: 3px;
        border:solid 2px black;
        border-radius: 4px;
        margin-bottom: -5px;
    }

    .logo img{
        width: 113px;
        height: 113px;
    }

    .imagen{
        width: 20%;
    }
    
    .imagen img{
        width: 113px;
        height: 113px;
        border:solid 3px;
        border-radius: 8px;
    }
    
    .qr img{
        width: 113px;
        height: 113px;
    }
    
    .celda p{
        margin-bottom: -15px;
        padding-right: 10px;
        text-align: center;
    }
    
    .celda.texto_abajo p{
        margin-left: auto;
        width: 94%;
        border-top:solid 1px black;
        font-weight: bold;
    }
    
    .firmas{
        margin-top:25px;
    }
    
    .firmas td{
        width: 5cm;
        text-align: center;
    }

    .celdas table{
        width: 100%;
        border-collapse: collapse;
    }

    .celdas table tbody tr td{
        width: 33.33%;
        height: 1.9cm;
    }
    
    </style>
</head>
<body>

<div class="celdas">
    <table border="1">
        <tbody>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="contenedor_tarjeta">
    <p class="nombre_empresa">LIGA DEPORTIVA "EL TEJAR"</p>
    <p class="lapaz_bol">LA PAZ - BOLIVIA</p>
    <table class="info_tarjeta">
        <tbody>
            <tr>
                <td rowspan="3" width="35%" class="logo">
                    <img src="escudo.jpg" alt="escudo" width="100%">
                </td>
                <td class="info_">
                    <p><strong>CAT: </strong> <span class="texto">{{$jugador->equipoclub->categoria->name}}</span></p>
                </td>
            </tr>
            <tr>
                <td class="info_"><p><strong>CLUB: </strong> <span class="texto">{{$jugador->equipoclub->name}}</span></p></td>
            </tr>
            <tr>
                <td class="info_"><p><strong>REG. No: </strong> <span class="texto">{{$jugador->id}}</span></p></td>
            </tr>
            
            <tr>
                <td rowspan="6" width="35%" class="imagen">
                    <img src="{{asset($jugador->foto)}}" alt="" width="100%">
                </td>
                <td class="celda">
                    <p>{{$jugador->nom}}</p>
                </td>
            </tr>
            <tr>
                <td class="celda texto_abajo"><p>NOMBRES</p></td>
            </tr>
            <tr>
                <td class="celda">
                    <p>{{$jugador->apep}}</p>
                </td>
            </tr>
            <tr>
                <td class="celda texto_abajo"><p>APELLIDO PATERNO</p></td>
            </tr>
            <tr>
                <td class="celda">
                    <p>{{$jugador->apem? :'-------------------------'}}</p>
                </td>
            </tr>
            <tr>
                <td class="celda texto_abajo"><p>APELLIDO MATERNO</p></td>
            </tr>
            <tr>
                <td rowspan="6" width="35%" class="qr">
                    <img src="{{asset('imagenes/qr/'.$jugador->qr)}}" alt="" width="100%">
                </td>
                <td class="celda">
                    <p>{{$jugador->fecha_nac}}</p>
                </td>
            </tr>
            <tr>
                <td class="celda texto_abajo"><p>FECHA DE NACIMIENTO</p></td>
            </tr>
            <tr>
                <td class="celda">
                    <p>{{$jugador->ci}} {{$jugador->ci_exp}}</p>
                </td>
            </tr>
            <tr>
                <td class="celda texto_abajo"><p>No CEDULA DE IDENTIDAD</p></td>
            </tr>
            <tr>
                <td class="celda">
                    <p>{{date('d-m-Y',strtotime($jugador->fecha_afi))}}</p>
                </td>
            </tr>
            <tr>
                <td class="celda texto_abajo"><p>FECHA DE HABILITACIÓN</p></td>
            </tr>
        </tbody>
    </table>
    <table class="firmas">`
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>.................................................</td>
            <td>................................................</td>
        </tr>
        <tr>
            <td>FIRMA DE JUGADOR</td>
            <td>FIRMA DE COMITE TÉCNICO</td>
        </tr>
    </table>
</div>
</body>
</html>



