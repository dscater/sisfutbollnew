<?php

namespace App\Http\Controllers;

use App\Models\campeonato;
use App\Models\partido;
use App\Models\equipoClub;
use App\Models\Inscripcion;
use App\Models\TablaPosicion;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PartidoController extends Controller
{
    public function index()
    {
        $id= 0;
        $partidos = partido::all()->sortByDesc("fecha_Par");
        //$partidos = partido::select("*")->orderBy("fecha_Par", "desc")->get();
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.index', compact('partidos', 'campeonato', 'equipo', 'id'));
    }

    public function create()
    {
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.create', compact('campeonato', 'equipo'));
    }
    public function edit($id)
    {
        $partido = partido::find($id);
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.editar', compact('id', 'partido', 'campeonato', 'equipo'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'campeonato_id' => 'required|exists:campeonatos,id',
            'equipoA_id' => 'required|exists:equipo_Clubs,id',
            'equipoB_id' => 'required|exists:equipo_Clubs,id'


        ]);
        $input=$request->all();
        $partido = partido::find($id);
        $partido->campeonato_id=$request->campeonato_id;
        $partido->equipoA_id=$request->equipoA_id;
        $partido->equipoB_id=$request->equipoB_id;
        $partido->gol_equipoA=$request->gol_equipoA;
        $partido->gol_equipoB=$request->gol_equipoB;
        $partido->fecha_Par=$request->fecha_Par;
        $partido->hora=$request->hora;
        $partido->walkover=$request->walkover;
        $partido->detalle=$request->detalle;
        $partido->estado=$request->estado;
        $partido->tipo=$request->tipo;
        $partido->save();


        $id= $request->campeonato_id;
        $partidos = partido::all()->sortByDesc("fecha_Par");
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.index', compact('partidos', 'campeonato', 'equipo', 'id'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'campeonato_id' => 'required|exists:campeonatos,id',
            'equipoA_id' => 'required|exists:equipo_Clubs,id',
            'equipoB_id' => 'required|exists:equipo_Clubs,id'

        ]);
        echo Json_encode($request->campeonato_id);
        echo Json_encode($request->equipoA_id);
        echo Json_encode($request->equipoB_id);
        $input=$request->all();

        $partido = new partido();
        $partido->campeonato_id = intval($request->campeonato_id);
        $partido->equipoA_id = intval($request->equipoA_id);
        $partido->equipoB_id = intval($request->equipoB_id);
        $partido->save();

        $id= 'todos los partidos';
        $partidos = partido::all()->sortByDesc("fecha_Par");
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.index', compact('partidos', 'campeonato', 'equipo', 'id'));
    }
    public function generar($id)
    {
        partido::Where('campeonato_id', '=', $id)->delete();
        $Inscrip = Inscripcion::select('equipo_id')->where('campeonato_id', $id)->get();

        $dato = array();
        foreach ($Inscrip as $i =>$Equipo_id) {
            $dato[$i] = $Equipo_id->equipo_id;

        }

        for ($i=0; $i <= sizeof($dato)-1; $i++) {
            for ($j=$i+1; $j <= sizeof($dato)-1; $j++) {
                $partidoNew = new partido();
                $partidoNew->campeonato_id = $id;
                $partidoNew->equipoA_id = $dato[$i];
                $partidoNew->equipoB_id = $dato[$j];
                $partidoNew->save();
            }
        }
        $partidos = partido::all()->sortByDesc("fecha_Par");
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.index', compact('partidos', 'campeonato', 'equipo', 'id'));

    }

    public function generarVar($id)
    {
        partido::Where('campeonato_id', '=', $id)->delete();
        $Inscrip = Inscripcion::select('equipo_id')->where('campeonato_id', $id)->get();

        $dato = array();
        foreach ($Inscrip as $i =>$Equipo_id) {
            $dato[$i] = $Equipo_id->equipo_id;

        }

        for ($i=0; $i <= sizeof($dato)-1; $i++) {
            for ($j=$i+1; $j <= sizeof($dato)-1; $j++) {
                $partidoNew = new partido();
                $partidoNew->campeonato_id = $id;
                $partidoNew->equipoA_id = $dato[$i];
                $partidoNew->equipoB_id = $dato[$j];
                $partidoNew->save();

                $partidoNew2 = new partido();
                $partidoNew2->campeonato_id = $id;
                $partidoNew2->equipoA_id = $dato[$j];
                $partidoNew2->equipoB_id = $dato[$i];
                $partidoNew2->save();
            }
        }
        $partidos = partido::all()->sortByDesc("fecha_Par");
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.index', compact('partidos', 'campeonato', 'equipo', 'id'));

    }

    function buscarpartido(Request $request){
        $id = $request->campeonato_id;
        $partidos = partido::where('campeonato_id','LIKE', $id)
        ->orderBy("fecha_Par", "desc")->get();
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.index', compact('partidos', 'campeonato', 'equipo', 'id'));
    }
    public function generarterceros($id)
    {
        partido::where('campeonato_id','LIKE', $id)->where('tipo', 'like', '3')->delete();
        $posiciones = TablaPosicion::all()->sortByDesc('puntos')->sortByDesc('Gd');



        $p1 = TablaPosicion::where('campeonato_id','LIKE', $id)
        ->orderBy("puntos","desc")->orderBy("Gd","desc")->skip(0)->take(1)->first();
        $p2 = TablaPosicion::where('campeonato_id','LIKE', $id)
        ->orderBy("puntos","desc")->orderBy("Gd","desc")->skip(1)->take(1)->first();
        $p3 = TablaPosicion::where('campeonato_id','LIKE', $id)
        ->orderBy("puntos","desc")->orderBy("Gd","desc")->skip(2)->take(1)->first();
        $p4 = TablaPosicion::where('campeonato_id','LIKE', $id)
        ->orderBy("puntos","desc")->orderBy("Gd","desc")->skip(3)->take(1)->first();
        $p5 = TablaPosicion::where('campeonato_id','LIKE', $id)
        ->orderBy("puntos","desc")->orderBy("Gd","desc")->skip(4)->take(1)->first();
        $p6 = TablaPosicion::where('campeonato_id','LIKE', $id)
        ->orderBy("puntos","desc")->orderBy("Gd","desc")->skip(5)->take(1)->first();

        $Part1 = new partido();
        $Part1->campeonato_id = $id;
        $Part1->equipoA_id = $p1->equipo_id;
        $Part1->equipoB_id = $p2->equipo_id;
        $Part1->tipo = 3;
        $Part1->save();


        $Part2 = new partido();
        $Part2->campeonato_id = $id;
        $Part2->equipoA_id = $p3->equipo_id;
        $Part2->equipoB_id = $p4->equipo_id;
        $Part2->tipo = 3;
        $Part2->save();

        $Part3 = new partido();
        $Part3->campeonato_id = $id;
        $Part3->equipoA_id = $p5->equipo_id;
        $Part3->equipoB_id = $p6->equipo_id;
        $Part3->tipo = 3;
        $Part3->save();

        $partidos = partido::all()->sortByDesc("fecha_Par");
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.index', compact('partidos', 'campeonato', 'equipo', 'id'));
    }
    public function semifinal($id)
    {
        partido::where('campeonato_id','LIKE', $id)->where('tipo', 'like', '2')->delete();
        $partidosg1 = partido::where('campeonato_id','LIKE', $id)->where('tipo', 'like', '3')->skip(0)->take(1)->first();
        $partidosg2 = partido::where('campeonato_id','LIKE', $id)->where('tipo', 'like', '3')->skip(1)->take(1)->first();
        $partidosg3 = partido::where('campeonato_id','LIKE', $id)->where('tipo', 'like', '3')->skip(2)->take(1)->first();

        $Part1 = new partido();
        $Part1->campeonato_id = $id;

        if ($partidosg1->gol_equipoA > $partidosg1->gol_equipoB) {
            if ($partidosg2->gol_equipoA > $partidosg2->gol_equipoB) {
                $Part1->equipoA_id = $partidosg1->equipoA_id;
                $Part1->equipoB_id = $partidosg2->equipoA_id;
                $perdedor1 = $partidosg1->equipoB_id;
                $gd1 = $partidosg1->gol_equipoB - $partidosg1->gol_equipoA;
                $perdedor2 = $partidosg2->equipoB_id;
                $gd2 = $partidosg2->gol_equipoB - $partidosg2->gol_equipoA;
            } else {
                $Part1->equipoA_id = $partidosg1->equipoA_id;
                $Part1->equipoB_id = $partidosg2->equipoB_id;
                $perdedor1 = $partidosg1->equipoB_id;
                $gd1 = $partidosg1->gol_equipoB - $partidosg1->gol_equipoA;
                $perdedor2 = $partidosg2->equipoA_id;
                $gd2 = $partidosg2->gol_equipoA - $partidosg2->gol_equipoB;
            }

        } else{
            if ($partidosg2->gol_equipoA > $partidosg2->gol_equipoB) {
                $Part1->equipoA_id = $partidosg1->equipoB_id;
                $Part1->equipoB_id = $partidosg2->equipoA_id;
                $perdedor1 = $partidosg1->equipoA_id;
                $gd1 = $partidosg1->gol_equipoA - $partidosg1->gol_equipoB;
                $perdedor2 = $partidosg2->equipoB_id;
                $gd2 = $partidosg2->gol_equipoB - $partidosg2->gol_equipoA;

            } else {
                $Part1->equipoA_id = $partidosg1->equipoB_id;
                $Part1->equipoB_id = $partidosg2->equipoB_id;
                $perdedor1 = $partidosg1->equipoA_id;
                $gd1 = $partidosg1->gol_equipoA - $partidosg1->gol_equipoB;
                $perdedor2 = $partidosg2->equipoA_id;
                $gd2 = $partidosg2->gol_equipoA - $partidosg2->gol_equipoB;
            }
        }
        $Part1->tipo = 2;
        $Part1->save();

        $Part2 = new partido();
        $Part2->campeonato_id = $id;

        if ($partidosg3->gol_equipoA > $partidosg3->gol_equipoB) {
            $perdedor3 = $partidosg3->equipoB_id;
            $gd3 = $partidosg3->gol_equipoA - $partidosg3->gol_equipoB;
        } else {
            $perdedor3 = $partidosg3->equipoA_id;
            $gd3 = $partidosg3->gol_equipoB - $partidosg3->gol_equipoA;
        }
        if ($gd1>$gd2) {
            if ($gd1>$gd3) {
                if ($partidosg3->gol_equipoA > $partidosg3->gol_equipoB) {
                    $Part2->equipoA_id = $partidosg3->equipoA_id;
                    $Part2->equipoB_id = $perdedor1;
                } else {
                    $Part2->equipoA_id = $partidosg3->equipoB_id;
                    $Part2->equipoB_id = $perdedor1;
                }
            } else {
                if ($partidosg3->gol_equipoA > $partidosg3->gol_equipoB) {
                    $Part2->equipoA_id = $partidosg3->equipoA_id;
                    $Part2->equipoB_id = $perdedor3;
                } else {
                    $Part2->equipoA_id = $partidosg3->equipoB_id;
                    $Part2->equipoB_id = $perdedor3;
                }
            }
        }else {
            if ($gd2>$gd3) {
                if ($partidosg3->gol_equipoA > $partidosg3->gol_equipoB) {
                    $Part2->equipoA_id = $partidosg3->equipoA_id;
                    $Part2->equipoB_id = $perdedor2;
                } else {
                    $Part2->equipoA_id = $partidosg3->equipoB_id;
                    $Part2->equipoB_id = $perdedor2;
                }
            } else {
                if ($partidosg3->gol_equipoA > $partidosg3->gol_equipoB) {
                    $Part2->equipoA_id = $partidosg3->equipoA_id;
                    $Part2->equipoB_id = $perdedor3;
                } else {
                    $Part2->equipoA_id = $partidosg3->equipoB_id;
                    $Part2->equipoB_id = $perdedor3;
                }
            }
        }

        $Part2->tipo = 2;
        $Part2->save();

        $partidos = partido::all()->sortByDesc("fecha_Par");
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.index', compact('partidos', 'campeonato', 'equipo', 'id'));
    }
    public function final($id)
    {
        partido::where('campeonato_id','LIKE', $id)->where('tipo', 'like', '0')->delete();
        $partidosg1 = partido::where('campeonato_id','LIKE', $id)->where('tipo', 'like', '2')->skip(0)->take(1)->first();
        $partidosg2 = partido::where('campeonato_id','LIKE', $id)->where('tipo', 'like', '2')->skip(1)->take(1)->first();

        $Part1 = new partido();
        $Part1->campeonato_id = $id;
        if ($partidosg1->gol_equipoA > $partidosg1->gol_equipoB) {
            if ($partidosg2->gol_equipoA > $partidosg2->gol_equipoB) {
                $Part1->equipoA_id = $partidosg1->equipoA_id;
                $Part1->equipoB_id = $partidosg2->equipoA_id;
                $perdedor1 = $partidosg1->equipoB_id;
                $gd1 = $partidosg1->gol_equipoB - $partidosg1->gol_equipoA;
                $perdedor2 = $partidosg2->equipoB_id;
                $gd2 = $partidosg2->gol_equipoB - $partidosg2->gol_equipoA;
            } else {
                $Part1->equipoA_id = $partidosg1->equipoA_id;
                $Part1->equipoB_id = $partidosg2->equipoB_id;
                $perdedor1 = $partidosg1->equipoB_id;
                $gd1 = $partidosg1->gol_equipoB - $partidosg1->gol_equipoA;
                $perdedor2 = $partidosg2->equipoA_id;
                $gd2 = $partidosg2->gol_equipoA - $partidosg2->gol_equipoB;
            }

        } else{
            if ($partidosg2->gol_equipoA > $partidosg2->gol_equipoB) {
                $Part1->equipoA_id = $partidosg1->equipoB_id;
                $Part1->equipoB_id = $partidosg2->equipoA_id;
                $perdedor1 = $partidosg1->equipoA_id;
                $gd1 = $partidosg1->gol_equipoA - $partidosg1->gol_equipoB;
                $perdedor2 = $partidosg2->equipoB_id;
                $gd2 = $partidosg2->gol_equipoB - $partidosg2->gol_equipoA;

            } else {
                $Part1->equipoA_id = $partidosg1->equipoB_id;
                $Part1->equipoB_id = $partidosg2->equipoB_id;
                $perdedor1 = $partidosg1->equipoA_id;
                $gd1 = $partidosg1->gol_equipoA - $partidosg1->gol_equipoB;
                $perdedor2 = $partidosg2->equipoA_id;
                $gd2 = $partidosg2->gol_equipoA - $partidosg2->gol_equipoB;
            }
        }
        $Part1->tipo = 0;
        $Part1->save();

        $partidos = partido::all()->sortByDesc("fecha_Par");
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.index', compact('partidos', 'campeonato', 'equipo', 'id'));
    }

    public function destroy($id)
    {
        partido::find($id)->delete();
        $id= 0;
        $partidos = partido::all()->sortByDesc("fecha_Par");
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.index', compact('partidos', 'campeonato', 'equipo', 'id'));
    }

    public function downloadPdf($idf)
    {

        //$tabla = TablaPosicion::where('campeonato_id', $idf)->get();
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        $Inscrip = Inscripcion::where('campeonato_id', $idf)->get();
        $partido = partido::where('campeonato_id','LIKE', $idf)->where('tipo', 'like', '0')->first();
        echo $partido."<br>";
        if ($partido->gol_equipoA > $partido->gol_equipoB) {
            $pfinal = $partido->equipoA_id;

        } else {
            $pfinal = $partido->equipoB_id;

        }

        view()->share('partidos.pdf',$Inscrip, $campeonato, $equipo, $idf, $pfinal, $partido);

        $pdf = PDF::loadView('partidos.pdf', ['Inscrip'=>$Inscrip, 'campeonato'=>$campeonato, 'equipo'=>$equipo, 'idf'=>$idf, 'pfinal'=>$pfinal, 'partido'=>$partido]);

        return $pdf->stream('Report_'.$campeonato[$idf].'.pdf');
    }




}
