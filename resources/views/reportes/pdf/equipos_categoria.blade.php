@php
    $titulo = 'LISTA DE EQUIPOS POR CATEGORÍA';
@endphp
@include('reportes.pdf.parcial.encabezado_general')
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
                    <td class="img_celda2">
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
