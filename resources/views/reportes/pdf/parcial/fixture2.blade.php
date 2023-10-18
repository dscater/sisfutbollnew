    @include('reportes.pdf.parcial.encabezado')
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
                            <td bgcolor="orange" class="centreado">{{ date('d/m/Y', strtotime($value->fecha_Par)) }}</td>
                            <td bgcolor="lime" class="centreado">{{ date('H:i a', strtotime($value->hora)) }}</td>
                            <td class="centreado">{{ $equipo[$value->equipoA_id] }}</td>
                            <td bgcolor="aqua" class="centreado">VS</td>
                            <td class="centreado">{{ $equipo[$value->equipoB_id] }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">SIN PARTIDOS PROGRAMADOS</td>
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
                            <td bgcolor="orange" class="centreado">{{ date('d/m/Y', strtotime($value->fecha_Par)) }}
                            </td>
                            <td bgcolor="lime" class="centreado">{{ date('H:i a', strtotime($value->hora)) }}</td>
                            <td class="centreado">{{ $equipo[$value->equipoA_id] }}</td>
                            <td bgcolor="aqua" class="centreado">VS</td>
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
                            <td bgcolor="orange" class="centreado">{{ date('d/m/Y', strtotime($value->fecha_Par)) }}
                            </td>
                            <td bgcolor="lime" class="centreado">{{ date('H:i a', strtotime($value->hora)) }}</td>
                            <td class="centreado">{{ $equipo[$value->equipoA_id] }}</td>
                            <td bgcolor="aqua" class="centreado">VS</td>
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
                        <td bgcolor="orange" class="centreado">{{ date('d/m/Y', strtotime($final->fecha_Par)) }}</td>
                        <td bgcolor="lime" class="centreado">{{ date('H:i a', strtotime($final->hora)) }}</td>
                        <td class="centreado">{{ $equipo[$final->equipoA_id] }}</td>
                        <td bgcolor="aqua" class="centreado">VS</td>
                        <td class="centreado">{{ $equipo[$final->equipoB_id] }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
    @endif
    </body>

    </html>
