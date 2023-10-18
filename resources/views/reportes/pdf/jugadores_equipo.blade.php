@php
    $titulo = 'LISTA DE JUGADORES POR EQUIPOS';
    $texto2 = $equipo->name;
@endphp
@include('reportes.pdf.parcial.encabezado_general')
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
                <td>{{ $value->ci }} {{ $value->ci_exp }}</td>
                <td>{{ $value->fecha_nac }}</td>
                <td>{{ $value->lugar_nac }}</td>
                <td>{{ $value->nacionalidad }}</td>
                <td>{{ $value->nro_casaca }}</td>
                <td>{{ $value->fecha_afi }}</td>
                <td class="img_celda2 centreado">
                    <img src="{{ asset($value->foto) }}" alt="">
                </td>
                <td>{{ $value->observacion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>

</html>
