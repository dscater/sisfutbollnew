<?php

namespace App\Http\Controllers;

use App\Models\equipoClub;
use App\Models\partido;
use App\Models\PuntosPartido;
use App\Models\campeonato;
use Illuminate\Http\Request;

class PuntosPartidoController extends Controller
{
    public function index()
    {

    }
    public function create($id)
    {
        PuntosPartido::where('partido_id', 'LIKE', $id)->delete();
        $partido = partido::find($id);
        $equipo = equipoClub::pluck('name', 'id');
        //echo $partido->walkover;

        $PuntPartidoEA = new PuntosPartido();
        $PuntPartidoEB = new PuntosPartido();

        if (intval($partido->walkover) == 0) {
            // "sin walkover";
            $PuntPartidoEA->campeonato_id = $partido->campeonato_id;
            $PuntPartidoEA->partido_id = $partido->id;
            $PuntPartidoEA->equipo_id = $partido->equipoA_id;
            $PuntPartidoEA->walkover = $partido->walkover;;
            $PuntPartidoEA->pj = 1;

            $PuntPartidoEB->campeonato_id = $partido->campeonato_id;
            $PuntPartidoEB->partido_id = $partido->id;
            $PuntPartidoEB->equipo_id =  $partido->equipoB_id;
            $PuntPartidoEB->walkover = $partido->walkover;
            $PuntPartidoEB->pj = 1;
            if (intval($partido->gol_equipoA) > intval($partido->gol_equipoB) ) {
                $PuntPartidoEA->Pg = 1;
                $PuntPartidoEB->Pp = 1;
                $PuntPartidoEB->Pg = 0;
                $PuntPartidoEA->Pp = 0;
                $PuntPartidoEA->Pe = 0;
                $PuntPartidoEB->Pe = 0;
                $PuntPartidoEA->Gf = $partido->gol_equipoA;
                $PuntPartidoEA->Gc = $partido->gol_equipoB;
                $PuntPartidoEB->Gf = $partido->gol_equipoB;
                $PuntPartidoEB->Gc = $partido->gol_equipoA;
                $PuntPartidoEB->Gd = 0;
                $PuntPartidoEA->Gd = 0;
                $PuntPartidoEB->save();
                $PuntPartidoEA->save();
            }
            if(intval($partido->gol_equipoA) < intval($partido->gol_equipoB) ) {
                $PuntPartidoEB->Pg = 1;
                $PuntPartidoEA->Pp = 1;
                $PuntPartidoEA->Pg = 0;
                $PuntPartidoEB->Pp = 0;
                $PuntPartidoEA->Pe = 0;
                $PuntPartidoEB->Pe = 0;
                $PuntPartidoEA->Gf = $partido->gol_equipoA;
                $PuntPartidoEA->Gc = $partido->gol_equipoB;
                $PuntPartidoEB->Gf = $partido->gol_equipoB;
                $PuntPartidoEB->Gc = $partido->gol_equipoA;
                $PuntPartidoEB->Gd = 0;
                $PuntPartidoEA->Gd = 0;
                $PuntPartidoEB->save();
                $PuntPartidoEA->save();
            }
            if (intval($partido->gol_equipoA) == intval($partido->gol_equipoB)) {
                $PuntPartidoEB->Pg = 0;
                $PuntPartidoEA->Pp = 0;
                $PuntPartidoEA->Pg = 0;
                $PuntPartidoEB->Pp = 0;
                $PuntPartidoEA->Pe = 1;
                $PuntPartidoEB->Pe = 1;
                $PuntPartidoEA->Gf = $partido->gol_equipoA;
                $PuntPartidoEA->Gc = $partido->gol_equipoB;
                $PuntPartidoEB->Gf = $partido->gol_equipoB;
                $PuntPartidoEB->Gc = $partido->gol_equipoA;
                $PuntPartidoEB->Gd = 0;
                $PuntPartidoEA->Gd = 0;
                $PuntPartidoEB->save();
                $PuntPartidoEA->save();
            }
        } elseif(intval($partido->walkover) == intval($partido->equipoA_id)) {
            $PuntPartidoEA->campeonato_id = $partido->campeonato_id;
            $PuntPartidoEA->partido_id = $partido->id;
            $PuntPartidoEA->equipo_id = $partido->equipoA_id;
            $PuntPartidoEA->walkover = 1;
            $PuntPartidoEA->pj = 1;

            $PuntPartidoEB->campeonato_id = $partido->campeonato_id;
            $PuntPartidoEB->partido_id = $partido->id;
            $PuntPartidoEB->equipo_id =  $partido->equipoB_id;
            $PuntPartidoEB->walkover = 0;
            $PuntPartidoEB->Pj = 1;

            $PuntPartidoEB->Pg = 1;
            $PuntPartidoEA->Pp = 1;
            $PuntPartidoEA->Pg = 0;
            $PuntPartidoEB->Pp = 0;
            $PuntPartidoEA->Pe = 0;
            $PuntPartidoEB->Pe = 0;
            $PuntPartidoEA->Gf = 0;
            $PuntPartidoEA->Gc = 0;
            $PuntPartidoEB->Gf = 0;
            $PuntPartidoEB->Gc = 0;
            $PuntPartidoEB->Gd = 3;
            $PuntPartidoEA->Gd = -3;
            $PuntPartidoEB->save();
            $PuntPartidoEA->save();
        } elseif(intval($partido->walkover) == intval($partido->equipoB_id)) {
            $PuntPartidoEA->campeonato_id = $partido->campeonato_id;
            $PuntPartidoEA->partido_id = $partido->id;
            $PuntPartidoEA->equipo_id = $partido->equipoA_id;
            $PuntPartidoEA->walkover = 0;
            $PuntPartidoEA->pj = 1;

            $PuntPartidoEB->campeonato_id = $partido->campeonato_id;
            $PuntPartidoEB->partido_id = $partido->id;
            $PuntPartidoEB->equipo_id =  $partido->equipoB_id;
            $PuntPartidoEB->walkover = 1;
            $PuntPartidoEB->Pj = 1;

            $PuntPartidoEB->Pg = 0;
            $PuntPartidoEA->Pp = 0;
            $PuntPartidoEA->Pg = 1;
            $PuntPartidoEB->Pp = 1;
            $PuntPartidoEA->Pe = 0;
            $PuntPartidoEB->Pe = 0;
            $PuntPartidoEA->Gf = 0;
            $PuntPartidoEA->Gc = 0;
            $PuntPartidoEB->Gf = 0;
            $PuntPartidoEB->Gc = 0;
            $PuntPartidoEB->Gd = -3;
            $PuntPartidoEA->Gd = 3;
            $PuntPartidoEB->save();
            $PuntPartidoEA->save();
        }

        #echo "<script>alert('se registro los puntos');</script>";

        $id= $partido->campeonato_id;
        $partidos = partido::all()->sortByDesc("fecha_Par");
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.index', compact('partidos', 'campeonato', 'equipo', 'id'));

    }
}
