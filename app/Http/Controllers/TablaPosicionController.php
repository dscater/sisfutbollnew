<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\campeonato;
use App\Models\equipoClub;
use App\Models\Inscripcion;
use App\Models\PuntosPartido;
use App\Models\TablaPosicion;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class TablaPosicionController extends Controller
{
    public function index()
    {
        $campeonatos = campeonato::all();
        return view('tabposicion.index', compact('campeonatos'));
    }

    public function listado()
    {
        $campeonatos = campeonato::all();
        $array_campeonatos[""] = "Seleccione campeonato";
        foreach ($campeonatos as $value) {
            $array_campeonatos[$value->id] = $value->nombre;
        }
        return view("tabposicion.listado", compact("array_campeonatos"));
    }

    public function buscarcamp(Request $request)
    {
        $id = $request->campeonato_id;
        $posiciones = TablaPosicion::where('campeonato_id', 'LIKE', $id)->orderBy('puntos', 'desc')->orderBy('GD', 'desc')->get();
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        $cantidad = TablaPosicion::Where('campeonato_id', 'LIKE', $id)->count();
        return view('tabposicion.index', compact('posiciones', 'campeonato', 'equipo', 'id', 'cantidad'));
    }

    public function actualizar($id)
    {
        $equipos = Inscripcion::where("campeonato_id", $id)->get();
        foreach ($equipos as $equipo) {
            $existe_posicion = TablaPosicion::where('campeonato_id', $id)->where("equipo_id", $equipo->equipo_id)->get()->first();
            if (!$existe_posicion) {
                TablaPosicion::create([
                    "campeonato_id" => $id,
                    "equipo_id" => $equipo->equipo_id,
                    "walkover" => 0,
                    "puntos" => 0,
                    "Pj" => 0,
                    "Pp" => 0,
                    "Pe" => 0,
                    "Gf" => 0,
                    "Gc" => 0,
                    "Gd" => 0,
                ]);
            }
        }
        $posiciones = TablaPosicion::where('campeonato_id', $id)->orderBy("puntos", "desc")->orderBy("GD", "desc")->get()();
        return view('tabposicion.index', compact('posiciones'));
    }

    public static function actualizar_posiciones_campeonato($id, $equipoA, $equipoB, $grupo = NULL)
    {
        $equipos = Inscripcion::where("campeonato_id", $id)->whereIn("equipo_id", [$equipoA, $equipoB])->get();
        foreach ($equipos as $equipo) {
            $existe_posicion = TablaPosicion::where('campeonato_id', $id)->where("equipo_id", $equipo->equipo_id)->get()->first();
            if ($grupo != NULL) {
                $existe_posicion = TablaPosicion::where('campeonato_id', $id)->where("equipo_id", $equipo->equipo_id)->where("grupo", $grupo)->get()->first();
            } else {
                $existe_posicion = TablaPosicion::where('campeonato_id', $id)->where("equipo_id", $equipo->equipo_id)->get()->first();
            }
            if (!$existe_posicion) {
                $existe_posicion = TablaPosicion::create([
                    "campeonato_id" => $id,
                    "equipo_id" => $equipo->equipo_id,
                    "walkover" => 0,
                    "puntos" => 0,
                    "Pj" => 0,
                    "Pp" => 0,
                    "Pe" => 0,
                    "Gf" => 0,
                    "Gc" => 0,
                    "Gd" => 0,
                ]);
            }
            if ($grupo != NULL) {
                $existe_posicion->grupo = $grupo;
            }
            // verificar cantidad partidos
            $partidos = PuntosPartido::where("campeonato_id", $id)->where("equipo_id", $equipo->equipo_id)->get();
            $existe_posicion->pj = count($partidos);

            // partidos - ganados
            $ganados = PuntosPartido::where("campeonato_id", $id)->where("equipo_id", $equipo->equipo_id)->where("Pg", ">", 0)->get();
            $existe_posicion->Pg = count($ganados) * 3;

            // partidos - perdidos
            $perdidos = PuntosPartido::where("campeonato_id", $id)->where("equipo_id", $equipo->equipo_id)->where("Pp", ">", 0)->get();
            $existe_posicion->Pp = count($perdidos);

            // puntos - empatados
            $empatados = PuntosPartido::where("campeonato_id", $id)->where("equipo_id", $equipo->equipo_id)->where("Pe", ">", 0)->get();
            $existe_posicion->Pe = count($empatados);

            // goles a favor
            $goles_favor = PuntosPartido::where("campeonato_id", $id)->where("equipo_id", $equipo->equipo_id)->sum("Gf");
            $existe_posicion->Gf = $goles_favor;

            // goles en contra
            $goles_contra = PuntosPartido::where("campeonato_id", $id)->where("equipo_id", $equipo->equipo_id)->sum("Gc");
            $existe_posicion->Gc = $goles_contra;

            // diferencia de goles
            $diferencia_goles = PuntosPartido::where("campeonato_id", $id)->where("equipo_id", $equipo->equipo_id)->sum("Gd");
            $existe_posicion->GD = $diferencia_goles;

            // PUNTOS
            $existe_posicion->puntos = count($ganados) * 3 + count($empatados);
            $existe_posicion->save();
        }

        return true;
    }

    public function downloadPdf($idf)
    {
        //$tabla = TablaPosicion::join("users","users.id","=","facturas.user_id")->where("facturas.ID_Factura", $idf)->select("facturas.ID_Factura", "facturas.user_id", "facturas.id_hardware", "facturas.consumo", "facturas.Costo", "facturas.Estado", "users.name")->get();
        $tabla = TablaPosicion::where('campeonato_id', $idf)->orderBy("puntos", "desc")->orderBy("GD", "desc")->get();
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');

        view()->share('tabposicion.pdf', $tabla, $campeonato, $equipo, $idf);

        $pdf = PDF::loadView('tabposicion.pdf', ['tabla' => $tabla, 'campeonato' => $campeonato, 'equipo' => $equipo, 'idf' => $idf]);

        return $pdf->stream('tabpos_' . $campeonato[$idf] . '.pdf');
    }

    public function detalle(campeonato $campeonato)
    {
        // return $campeonato;
        $posiciones = TablaPosicion::where("campeonato_id", $campeonato->id)->orderBy("puntos", "desc")->orderBy("GD", "desc")->get();
        $grupos = [];
        $grupos_clasificados = [];
        if ($campeonato->serie == 'SERIE 2') {
            $grupos = ["A", "B"];
            $posiciones = [];
            foreach ($grupos as $grupo) {
                $posiciones[$grupo] = TablaPosicion::where("campeonato_id", $campeonato->id)->where("grupo", $grupo)->orderBy("puntos", "desc")->orderBy("GD", "desc")->get();
            }
        }
        if ($campeonato->serie == 'SERIE 3') {
            $grupos = ["A", "B", "C"];
            $posiciones = [];
            foreach ($grupos as $grupo) {
                $posiciones[$grupo] = TablaPosicion::where("campeonato_id", $campeonato->id)->where("grupo", $grupo)->orderBy("puntos", "desc")->orderBy("GD", "desc")->get();
            }
        }
        if ($campeonato->serie == 'SERIE 6') {
            $grupos = ["A", "B", "C", "D", "E", "F"];
            $posiciones = [];
            foreach ($grupos as $grupo) {
                $posiciones[$grupo] = TablaPosicion::where("campeonato_id", $campeonato->id)->where("grupo", $grupo)->orderBy("puntos", "desc")->orderBy("GD", "desc")->get();
            }

            $grupos_clasificados = ["1", "2"];
            foreach ($grupos_clasificados as $grupo) {
                $posiciones[$grupo] = TablaPosicion::where("campeonato_id", $campeonato->id)->where("grupo", $grupo)->orderBy("puntos", "desc")->orderBy("GD", "desc")->get();
            }
        }

        return view("tabposicion.detalle", compact("campeonato", "posiciones", "grupos", "grupos_clasificados"));
    }


    public function getTablasCampeonato(Request $request)
    {
        $campeonato = campeonato::find($request->id);
        // return $campeonato;
        $posiciones = TablaPosicion::where("campeonato_id", $campeonato->id)->orderBy("puntos", "desc")->orderBy("GD", "desc")->get();
        $grupos = [];
        $grupos_clasificados = [];
        $html = "";
        $html = view("tabposicion.parcial.serie1", compact("posiciones"))->render();
        if ($campeonato->serie == 'SERIE 2') {
            $grupos = ["A", "B"];
            $posiciones = [];
            foreach ($grupos as $grupo) {
                $posiciones[$grupo] = TablaPosicion::where("campeonato_id", $campeonato->id)->where("grupo", $grupo)->orderBy("puntos", "desc")->orderBy("GD", "desc")->get();
            }
            $html = view("tabposicion.parcial.serie2", compact("posiciones", "grupos"))->render();
        }
        if ($campeonato->serie == 'SERIE 3') {
            $grupos = ["A", "B", "C"];
            $posiciones = [];
            foreach ($grupos as $grupo) {
                $posiciones[$grupo] = TablaPosicion::where("campeonato_id", $campeonato->id)->where("grupo", $grupo)->orderBy("puntos", "desc")->orderBy("GD", "desc")->get();
            }
            $html = view("tabposicion.parcial.serie3", compact("posiciones", "grupos"))->render();
        }
        if ($campeonato->serie == 'SERIE 6') {
            $grupos = ["A", "B", "C", "D", "E", "F"];
            $posiciones = [];
            foreach ($grupos as $grupo) {
                $posiciones[$grupo] = TablaPosicion::where("campeonato_id", $campeonato->id)->where("grupo", $grupo)->orderBy("puntos", "desc")->orderBy("GD", "desc")->get();
            }

            $grupos_clasificados = ["1", "2"];
            foreach ($grupos_clasificados as $grupo) {
                $posiciones[$grupo] = TablaPosicion::where("campeonato_id", $campeonato->id)->where("grupo", $grupo)->orderBy("puntos", "desc")->orderBy("GD", "desc")->get();
            }
            $html = view("tabposicion.parcial.serie6", compact("posiciones", "grupos", "grupos_clasificados"))->render();
        }

        return response()->JSON($html);;
    }
}
