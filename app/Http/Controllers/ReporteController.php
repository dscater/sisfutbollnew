<?php

namespace App\Http\Controllers;

use App\Models\campeonato;
use App\Models\categoria;
use App\Models\equipoClub;
use App\Models\jugador;
use App\Models\partido;
use App\Models\sancion;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ReporteController extends Controller
{
    public function tarjeta_jugador()
    {
        $jugadores = jugador::all();
        $array_jugadores[""] = "Seleccione...";
        foreach ($jugadores as $value) {
            $array_jugadores[$value->id] = $value->full_name;
        }
        return view("reportes.tarjeta_jugador", compact("array_jugadores"));
    }
    public function tarjeta_jugador_pdf(Request $request)
    {
        $jugador = jugador::find($request->jugador_id);
        if ($jugador) {
            $pdf = PDF::loadView('reportes.pdf.tarjeta_jugador', compact('jugador'));
            return $pdf->stream('Tarjeta.pdf');
        }
    }

    public function jugador()
    {
        $jugadores = jugador::all();
        $array_jugadores[""] = "Seleccione...";
        foreach ($jugadores as $value) {
            $array_jugadores[$value->id] = $value->full_name;
        }
        return view("reportes.jugador", compact("array_jugadores"));
    }
    public function jugador_pdf(Request $request)
    {
        $jugador = jugador::find($request->jugador_id);
        $pdf = PDF::loadView('reportes.pdf.jugador', compact('jugador'));
        return $pdf->stream('Jugador.pdf');
    }

    public function equipos_categoria()
    {
        $categorias = categoria::all();
        $array_categorias["todos"] = "Todos";
        foreach ($categorias as $value) {
            $array_categorias[$value->id] = $value->name;
        }
        return view("reportes.equipos_categoria", compact("array_categorias"));
    }
    public function equipos_categoria_pdf(Request $request)
    {
        $equipos = equipoClub::all();
        if ($request->categoria_id != 'todos') {
            $equipos = equipoClub::where("categoria_id", $request->categoria_id)->get();
        }
        $pdf = PDF::loadView('reportes.pdf.equipos_categoria', compact('equipos'))->setPaper('legal', 'landscape');
        return $pdf->stream('EquiposCategoría.pdf');
    }

    public function fixture()
    {
        $campeonatos = campeonato::all();
        $array_campeonatos[""] = "Seleccione...";
        foreach ($campeonatos as $value) {
            $array_campeonatos[$value->id] = $value->nombre;
        }
        return view("reportes.fixture", compact("array_campeonatos"));
    }
    public function fixture_pdf(Request $request)
    {
        $id = $request->campeonato_id;
        $s_fecha = $request->s_fecha;
        $fecha = $request->fecha;
        $o_campeonato = campeonato::find($id);
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');

        if ($s_fecha != "todos") {
            $clasificatorias = partido::where('campeonato_id', $id)
                ->where("fecha_Par", $fecha)->where('tipo', '1')->orderBy("fecha_Par", "asc")->get(); // clasificatorias
            $partidos_terminados_clasificatorias = partido::where('campeonato_id', $id)
                ->where("fecha_Par", $fecha)->where('tipo', '1')->where("estado", 1)->orderBy("fecha_Par", "asc")->get(); // clasificatorias
            $segunda_clasificatorias = partido::where('campeonato_id', $id)
                ->where("fecha_Par", $fecha)->where('tipo', '4')->orderBy("fecha_Par", "asc")->get(); // clasificatorias
            $segunda_clasificatorias_terminados = partido::where('campeonato_id', $id)
                ->where("fecha_Par", $fecha)->where('tipo', '4')->where("estado", 1)->orderBy("fecha_Par", "asc")->get(); // clasificatorias
            $cuartos = partido::where('campeonato_id', $id)
                ->where("fecha_Par", $fecha)->where('tipo', '3')->orderBy("fecha_Par", "asc")->get(); // cuartos
            $cuartos_completos = partido::where('campeonato_id', $id)
                ->where("fecha_Par", $fecha)->where('tipo', '3')->where("estado", 1)->get(); // cuartos_completos
            $semifinales = partido::where('campeonato_id', $id)
                ->where("fecha_Par", $fecha)->where('tipo', '2')->orderBy("fecha_Par", "asc")->get(); // semifinal
            $semifinales_completos = partido::where('campeonato_id', $id)
                ->where("fecha_Par", $fecha)->where('tipo', '2')->where("estado", 1)->get(); // semifinales_completos
            $final = partido::where('campeonato_id', $id)
                ->where("fecha_Par", $fecha)->where('tipo', '0')->get()->last(); // final
        } else {
            $clasificatorias = partido::where('campeonato_id', $id)->where('tipo', '1')->orderBy("fecha_Par", "asc")->get(); // clasificatorias
            $partidos_terminados_clasificatorias = partido::where('campeonato_id', $id)->where('tipo', '1')->where("estado", 1)->orderBy("fecha_Par", "asc")->get(); // clasificatorias
            $segunda_clasificatorias = partido::where('campeonato_id', $id)->where('tipo', '4')->orderBy("fecha_Par", "asc")->get(); // clasificatorias
            $segunda_clasificatorias_terminados = partido::where('campeonato_id', $id)->where('tipo', '4')->where("estado", 1)->orderBy("fecha_Par", "asc")->get(); // clasificatorias
            $cuartos = partido::where('campeonato_id', $id)->where('tipo', '3')->orderBy("fecha_Par", "asc")->get(); // cuartos
            $cuartos_completos = partido::where('campeonato_id', $id)->where('tipo', '3')->where("estado", 1)->get(); // cuartos_completos
            $semifinales = partido::where('campeonato_id', $id)->where('tipo', '2')->orderBy("fecha_Par", "asc")->get(); // semifinal
            $semifinales_completos = partido::where('campeonato_id', $id)->where('tipo', '2')->where("estado", 1)->get(); // semifinales_completos
            $final = partido::where('campeonato_id', $id)->where('tipo', '0')->get()->last(); // final
        }


        if ($o_campeonato->serie == 'SERIE 1') {
            $pdf = PDF::loadView('reportes.pdf.parcial.fixture1', compact(
                'o_campeonato',
                'campeonato',
                'equipo',
                'clasificatorias',
                'partidos_terminados_clasificatorias',
                'segunda_clasificatorias',
                'segunda_clasificatorias_terminados',
                'cuartos',
                'semifinales',
                'final',
                'cuartos_completos',
                'semifinales_completos',
                'id',
                "s_fecha",
                "fecha"
            ))->setPaper('letter', 'portrait');
            return $pdf->stream('fixture.pdf');
        }
        if ($o_campeonato->serie == 'SERIE 2') {
            $pdf = PDF::loadView('reportes.pdf.parcial.fixture2', compact(
                'o_campeonato',
                'campeonato',
                'equipo',
                'clasificatorias',
                'partidos_terminados_clasificatorias',
                'segunda_clasificatorias',
                'segunda_clasificatorias_terminados',
                'cuartos',
                'semifinales',
                'final',
                'cuartos_completos',
                'semifinales_completos',
                'id',
                "s_fecha",
                "fecha"
            ))->setPaper('letter', 'portrait');
            return $pdf->stream('fixture.pdf');
        }
        if ($o_campeonato->serie == 'SERIE 3') {
            $pdf = PDF::loadView('reportes.pdf.parcial.fixture3', compact(
                'o_campeonato',
                'campeonato',
                'equipo',
                'clasificatorias',
                'partidos_terminados_clasificatorias',
                'segunda_clasificatorias',
                'segunda_clasificatorias_terminados',
                'cuartos',
                'semifinales',
                'final',
                'cuartos_completos',
                'semifinales_completos',
                'id',
                "s_fecha",
                "fecha"
            ))->setPaper('letter', 'portrait');
            return $pdf->stream('fixture.pdf');
        }
        if ($o_campeonato->serie == 'SERIE 6') {
            $pdf = PDF::loadView('reportes.pdf.parcial.fixture6', compact(
                'o_campeonato',
                'campeonato',
                'equipo',
                'clasificatorias',
                'partidos_terminados_clasificatorias',
                'segunda_clasificatorias',
                'segunda_clasificatorias_terminados',
                'cuartos',
                'semifinales',
                'final',
                'cuartos_completos',
                'semifinales_completos',
                'id',
                "s_fecha",
                "fecha"
            ))->setPaper('letter', 'portrait');
            return $pdf->stream('fixture.pdf');
        }
    }

    public function jugadores_equipo()
    {
        $equipos = equipoClub::all();
        $array_equipos[""] = "Seleccione...";
        foreach ($equipos as $value) {
            $array_equipos[$value->id] = $value->name;
        }
        return view("reportes.jugadores_equipo", compact("array_equipos"));
    }
    public function jugadores_equipo_pdf(Request $request)
    {
        $equipo = equipoClub::find($request->equipo_id);
        $jugadores = jugador::where("equipoclub_id", $request->equipo_id)->get();
        $pdf = PDF::loadView('reportes.pdf.jugadores_equipo', compact('jugadores', 'equipo'))->setPaper('legal', 'landscape');
        return $pdf->stream('jugadores_equipo.pdf');
    }

    public function sanciones()
    {
        $campeonatos = campeonato::all();
        $array_campeonatos[""] = "Seleccione...";
        foreach ($campeonatos as $value) {
            $array_campeonatos[$value->id] = $value->nombre;
        }
        return view("reportes.sanciones", compact("array_campeonatos"));
    }
    public function sanciones_pdf(Request $request)
    {
        $campeonato_id = $request->campeonato_id;
        $equipo_id = $request->equipo_id;
        $equipo = equipoClub::find($request->equipo_id);
        $sanciones = sancion::select("sancions.*")
            ->join("jugadors", "jugadors.id", "=", "sancions.jugador_id")
            ->join("equipo_clubs", "equipo_clubs.id", "=", "jugadors.equipoclub_id")
            ->where("equipo_clubs.id", $equipo_id)
            ->get();
        $pdf = PDF::loadView('reportes.pdf.sanciones', compact('sanciones', 'equipo'))->setPaper('letter', 'portrait');
        return $pdf->stream('sanciones.pdf');
    }
}
