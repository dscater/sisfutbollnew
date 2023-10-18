@php
    $titulo = 'REPORTE DE SANCIONES';
    $texto2 = $equipo->name;
@endphp
@include('reportes.pdf.parcial.encabezado_general')
    <table border="1">
        <thead>
            <tr>
                <th width="5%">N°</th>
                <th>PATERNO</th>
                <th>MATERNO</th>
                <th>NOMBRE</th>
                <th>C.I.</th>
                <th>NRO. CASACA</th>
                <th>TARJETA</th>
                <th>FECHA SANCIÓN</th>
            </tr>
        </thead>
        <tbody>
            @php
                $cont = 1;
            @endphp
            @foreach ($sanciones as $value)
                <tr>
                    <td>{{ $cont++ }}</td>
                    <td>{{ $value->jugador->nom }}</td>
                    <td>{{ $value->jugador->apep }}</td>
                    <td>{{ $value->jugador->apem }}</td>
                    <td>{{ $value->jugador->ci }} {{ $value->jugador->ci_exp }}</td>
                    <td>{{ $value->jugador->nro_casaca }}</td>
                    <td>{{ $value->tarjeta }}</td>
                    <td>{{ date('d/m/Y', strtotime($value->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
