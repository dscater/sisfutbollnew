<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\TablaPosicion;
use GuzzleHttp\Promise\Create;
use App\Models\campeonato;
use App\Models\partido;
use App\Models\equipoClub;
use App\Http\Controllers\PartidoController;

class FixtureFinalController extends Controller
{
    public function index()
    {
        $id = 0;
        /*$posiciones = TablaPosicion::where('campeonato_id','LIKE', $id)
        ->orderBy("puntos","desc")->orderBy("Gd","desc")->skip(0)->take(2)->get();*/
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        $partido1 = partido::where('campeonato_id', 'LIKE', $id)->where('tipo', 'LIKE', '3')->skip(1)->take(1)->first();
        $partido2 = partido::where('campeonato_id', 'LIKE', $id)->where('tipo', 'LIKE', '3')->skip(1)->take(1)->first();
        $partido3 = partido::where('campeonato_id', 'LIKE', $id)->where('tipo', 'LIKE', '3')->skip(2)->take(1)->first();
        $partido4 = partido::where('campeonato_id', 'LIKE', $id)->where('tipo', 'LIKE', '2')->skip(0)->take(1)->first();
        $partido5 = partido::where('campeonato_id', 'LIKE', $id)->where('tipo', 'LIKE', '2')->skip(1)->take(1)->first();
        $partido6 = partido::where('campeonato_id', 'LIKE', $id)->where('tipo', 'LIKE', '0')->skip(0)->take(1)->first();
        return view('fixturefinal.index', compact(
            'campeonato',
            'equipo',
            'partido1',
            'partido2',
            'partido3',
            'partido4',
            'partido5',
            'partido6',
            'id'
        ));
    }

    public function listado(Request $request)
    {
        $campeonatos = campeonato::all();
        $array_campeonatos[""] = "Seleccione campeonato";
        foreach ($campeonatos as $value) {
            $array_campeonatos[$value->id] = $value->nombre;
        }
        return view("fixturefinal.listado", compact("array_campeonatos"));
    }
    public function getFixtureCampeonato(Request $request)
    {
        $id = $request->id;
        //echo $id."<br>";

        $o_campeonato = campeonato::find($id);
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        /**  TIPOS
         *  0: final
         *  1: clasificatoria
         *  2: semifinal
         *  3: cuartos
         *  4: Segunda Ronda (SERIE 6 - 7 equipos por grupo[1,2])
         */

        $clasificatorias = partido::where('campeonato_id', $id)->where('tipo', '1')->orderBy("fecha_Par", "asc")->get(); // clasificatorias
        $partidos_terminados_clasificatorias = partido::where('campeonato_id', $id)->where('tipo', '1')->where("estado", 1)->orderBy("fecha_Par", "asc")->get(); // clasificatorias
        $segunda_clasificatorias = partido::where('campeonato_id', $id)->where('tipo', '4')->orderBy("fecha_Par", "asc")->get(); // clasificatorias
        $segunda_clasificatorias_terminados = partido::where('campeonato_id', $id)->where('tipo', '4')->where("estado", 1)->orderBy("fecha_Par", "asc")->get(); // clasificatorias
        $cuartos = partido::where('campeonato_id', $id)->where('tipo', '3')->orderBy("fecha_Par", "asc")->get(); // cuartos
        $cuartos_completos = partido::where('campeonato_id', $id)->where('tipo', '3')->where("estado", 1)->get(); // cuartos_completos
        $semifinales = partido::where('campeonato_id', $id)->where('tipo', '2')->orderBy("fecha_Par", "asc")->get(); // semifinal
        $semifinales_completos = partido::where('campeonato_id', $id)->where('tipo', '2')->where("estado", 1)->get(); // semifinales_completos
        $final = partido::where('campeonato_id', $id)->where('tipo', '0')->get()->last(); // final

        if ($o_campeonato->serie == 'SERIE 1') {
            $html = view("fixturefinal.parcial.serie1", compact(
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
                'id'
            ))->render();
        }

        if ($o_campeonato->serie == 'SERIE 2') {
            $html = view("fixturefinal.parcial.serie2", compact(
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
                'id'
            ))->render();
        }

        if ($o_campeonato->serie == 'SERIE 3') {
            $html = view("fixturefinal.parcial.serie3", compact(
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
                'id'
            ))->render();
        }

        if ($o_campeonato->serie == 'SERIE 6') {
            $html = view("fixturefinal.parcial.serie6", compact(
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
                'id'
            ))->render();
        }

        return response()->JSON($html);;
    }


    public function buscador(Request $request)
    {
        $id = $request->campeonato_id;
        //echo $id."<br>";

        $o_campeonato = campeonato::find($id);
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        /**  TIPOS
         *  0: final
         *  1: clasificatoria
         *  2: semifinal
         *  3: cuartos
         *  4: Segunda Ronda (SERIE 6 - 7 equipos por grupo[1,2])
         */

        $clasificatorias = partido::where('campeonato_id', $id)->where('tipo', '1')->orderBy("fecha_Par", "asc")->get(); // clasificatorias
        $partidos_terminados_clasificatorias = partido::where('campeonato_id', $id)->where('tipo', '1')->where("estado", 1)->orderBy("fecha_Par", "asc")->get(); // clasificatorias
        $segunda_clasificatorias = partido::where('campeonato_id', $id)->where('tipo', '4')->orderBy("fecha_Par", "asc")->get(); // clasificatorias
        $segunda_clasificatorias_terminados = partido::where('campeonato_id', $id)->where('tipo', '4')->where("estado", 1)->orderBy("fecha_Par", "asc")->get(); // clasificatorias
        $cuartos = partido::where('campeonato_id', $id)->where('tipo', '3')->orderBy("fecha_Par", "asc")->get(); // cuartos
        $cuartos_completos = partido::where('campeonato_id', $id)->where('tipo', '3')->where("estado", 1)->get(); // cuartos_completos
        $semifinales = partido::where('campeonato_id', $id)->where('tipo', '2')->orderBy("fecha_Par", "asc")->get(); // semifinal
        $semifinales_completos = partido::where('campeonato_id', $id)->where('tipo', '2')->where("estado", 1)->get(); // semifinales_completos
        $final = partido::where('campeonato_id', $id)->where('tipo', '0')->get()->last(); // final
        return view('fixturefinal.index', compact(
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
            'id'
        ));
    }
    public function editPart($id)
    {
        //$partidoCon = new PartidoController;
        //$partidoCon->edit($id);
        echo "editar partido : " . $id . "<br>";
        $partido = partido::where('id', 'like', $id)->get();
        echo Json_encode($partido);
    }
}
