@php
    $titulo = 'REPORTE DE JUGADOR';
@endphp
@include('reportes.pdf.parcial.encabezado_general')
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
