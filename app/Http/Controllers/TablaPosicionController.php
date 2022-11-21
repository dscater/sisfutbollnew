<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\campeonato;
use App\Models\equipoClub;
use App\Models\PuntosPartido;
use App\Models\TablaPosicion;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class TablaPosicionController extends Controller
{
    public function index()
    {
        $id = 1;
        $posiciones = TablaPosicion::all()->sortByDesc('puntos')->sortByDesc('Gd');
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        $cantidad = TablaPosicion::Where('campeonato_id','LIKE', $id)->count();

        return view('tabposicion.index', compact('posiciones', 'campeonato', 'equipo', "id", 'cantidad'));
    }

    public function buscarcamp(Request $request)
    {
        $id = $request->campeonato_id;
        $posiciones = TablaPosicion::where('campeonato_id','LIKE', $id)->orderBy('puntos', 'desc')->orderBy('GD', 'desc')->get();
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        $cantidad = TablaPosicion::Where('campeonato_id','LIKE', $id)->count();
        return view('tabposicion.index', compact('posiciones', 'campeonato', 'equipo', 'id', 'cantidad'));
    }

    public function actualizar($id)
    {
        $posiciones1 = TablaPosicion::where('campeonato_id','LIKE', $id)->get();
        //$campeonato = campeonato::pluck('nombre', 'id');


        foreach ($posiciones1 as $equipo ) {
            $idtp = TablaPosicion::select('id')->where('campeonato_id','LIKE', $id)
            ->where('equipo_id','LIKE', $equipo->equipo_id)->get();
            //echo $equipo->equipo_id."<br>";
            $walkover =PuntosPartido::where('campeonato_id','LIKE', $id)->where('equipo_id', $equipo->equipo_id)->sum('walkover');
            $Pj = PuntosPartido::where('campeonato_id','LIKE', $id)->where('equipo_id', $equipo->equipo_id)->sum('Pj');
            $Pg = PuntosPartido::where('campeonato_id','LIKE', $id)->where('equipo_id', $equipo->equipo_id)->sum('Pg');
            $Pp = PuntosPartido::where('campeonato_id','LIKE', $id)->where('equipo_id', $equipo->equipo_id)->sum('Pp');
            $Pe = PuntosPartido::where('campeonato_id','LIKE', $id)->where('equipo_id', $equipo->equipo_id)->sum('Pe');
            $Gf = PuntosPartido::where('campeonato_id','LIKE', $id)->where('equipo_id', $equipo->equipo_id)->sum('Gf');
            $Gc = PuntosPartido::where('campeonato_id','LIKE', $id)->where('equipo_id', $equipo->equipo_id)->sum('Gc');
            $Gd = PuntosPartido::where('campeonato_id','LIKE', $id)->where('equipo_id', $equipo->equipo_id)->sum('GD');
            //echo "Pj---Pg---Pp---Pe---Gf---Gc---Gd---<br>";

            //echo $Pj."---".$Pg."---".$Pp."---".$Pe."---".$Gf."---".$Gc."---".$Gd."---<br>";
            $PosicionAct = TablaPosicion::where('campeonato_id','LIKE', $id)->where('equipo_id', $equipo->equipo_id)->first();
            //echo (($Pg*3)+$Pe)."<br>";
           // echo $PosicionAct;


            $PosicionAct->walkover = $walkover;
            $PosicionAct->puntos = (($Pg*3)+$Pe);
            $PosicionAct->Pj = $Pj;
            $PosicionAct->Pg = $Pg;
            $PosicionAct->Pp = $Pp;
            $PosicionAct->Pe = $Pe;
            $PosicionAct->Gf = $Gf;
            $PosicionAct->Gc = $Gc;
            $PosicionAct->Gd = ($Gf-$Gc)+$Gd;
            $PosicionAct->save();

        }
        $posiciones = TablaPosicion::all()->sortByDesc('puntos')->sortByDesc('Gd');
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        $cantidad = TablaPosicion::Where('campeonato_id','LIKE', $id)->count();
        return view('tabposicion.index', compact('posiciones', 'campeonato', 'equipo', "id", "cantidad"));
    }
    public function downloadPdf($idf)
    {
        //$tabla = TablaPosicion::join("users","users.id","=","facturas.user_id")->where("facturas.ID_Factura", $idf)->select("facturas.ID_Factura", "facturas.user_id", "facturas.id_hardware", "facturas.consumo", "facturas.Costo", "facturas.Estado", "users.name")->get();
        $tabla = TablaPosicion::where('campeonato_id', $idf)->get();
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');

        view()->share('tabposicion.pdf',$tabla, $campeonato, $equipo, $idf);

        $pdf = PDF::loadView('tabposicion.pdf', ['tabla'=>$tabla, 'campeonato'=>$campeonato, 'equipo'=>$equipo, 'idf'=>$idf]);

        return $pdf->stream('tabpos_'.$campeonato[$idf].'.pdf');
    }
}
