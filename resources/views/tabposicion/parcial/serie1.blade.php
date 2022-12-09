<table class="table table-bordered">
    <thead style="background-color:#6777ef" class="text-white">
        <tr>
            <th class="text-center">N°</th>
            <th class="text-center">EQUIPO</th>
            <th class="text-center">PJ</th>
            <th class="text-center">PG</th>
            <th class="text-center">PP</th>
            <th class="text-center">PE</th>
            <th class="text-center">GF</th>
            <th class="text-center">GC</th>
            <th class="text-center">GD</th>
            <th class="text-center">PUNTOS</th>
        </tr>
    </thead>
    <tbody>
        @php
            $cont = 1;
        @endphp
        @foreach ($posiciones as $key => $value)
            @php
                $primero = '';
                if ($key == 0) {
                    $primero = 'font-weight-bold text-lg';
                }
            @endphp
            <tr class="{{ $primero }}">
                <td>{{ $cont++ }}</td>
                <td>{{ $value->equipo->name }}</td>
                <td>{{ $value->Pj }}</td>
                <td>{{ $value->Pg }}</td>
                <td>{{ $value->Pp }}</td>
                <td>{{ $value->Pe }}</td>
                <td>{{ $value->Gf }}</td>
                <td>{{ $value->Gc }}</td>
                <td>{{ $value->GD }}</td>
                <td>{{ $value->puntos }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
