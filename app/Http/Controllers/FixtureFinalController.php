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
        $id = 0 ;
        /*$posiciones = TablaPosicion::where('campeonato_id','LIKE', $id)
        ->orderBy("puntos","desc")->orderBy("Gd","desc")->skip(0)->take(2)->get();*/
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        $partido1 = partido::where('campeonato_id','LIKE', $id)->where('tipo','LIKE', '3')->skip(1)->take(1)->first();
        $partido2 = partido::where('campeonato_id','LIKE', $id)->where('tipo','LIKE', '3')->skip(1)->take(1)->first();
        $partido3 = partido::where('campeonato_id','LIKE', $id)->where('tipo','LIKE', '3')->skip(2)->take(1)->first();
        $partido4 = partido::where('campeonato_id','LIKE', $id)->where('tipo','LIKE', '2')->skip(0)->take(1)->first();
        $partido5 = partido::where('campeonato_id','LIKE', $id)->where('tipo','LIKE', '2')->skip(1)->take(1)->first();
        $partido6 = partido::where('campeonato_id','LIKE', $id)->where('tipo','LIKE', '0')->skip(0)->take(1)->first();
        echo $partido1;
        return view('fixturefinal.index', compact('campeonato', 'equipo', 'partido1',
        'partido2','partido3','partido4','partido5','partido6', 'id'));
    }


    public function buscador(Request $request)
    {
        $id = $request->campeonato_id;
        //echo $id."<br>";

        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        $partido1 = partido::where('campeonato_id','LIKE', $id)->where('tipo','LIKE', '3')->skip(0)->take(1)->first();
        $partido2 = partido::where('campeonato_id','LIKE', $id)->where('tipo','LIKE', '3')->skip(1)->take(1)->first();
        $partido3 = partido::where('campeonato_id','LIKE', $id)->where('tipo','LIKE', '3')->skip(2)->take(1)->first();
        $partido4 = partido::where('campeonato_id','LIKE', $id)->where('tipo','LIKE', '2')->skip(0)->take(1)->first();
        $partido5 = partido::where('campeonato_id','LIKE', $id)->where('tipo','LIKE', '2')->skip(1)->take(1)->first();
        $partido6 = partido::where('campeonato_id','LIKE', $id)->where('tipo','LIKE', '0')->skip(0)->take(1)->first();
        //echo $partido1;
        return view('fixturefinal.index', compact('campeonato', 'equipo', 'partido1',
        'partido2','partido3','partido4','partido5','partido6', 'id'));
    }
    public function editPart($id)
    {
        //$partidoCon = new PartidoController;
        //$partidoCon->edit($id);
        echo "editar partido : ".$id."<br>";
        $partido = partido::where('id', 'like', $id)->get();
        echo Json_encode($partido);
    }

}
