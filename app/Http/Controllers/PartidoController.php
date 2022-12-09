<?php

namespace App\Http\Controllers;

use App\Models\campeonato;
use App\Models\partido;
use App\Models\equipoClub;
use App\Models\Inscripcion;
use App\Models\PuntosPartido;
use App\Models\TablaPosicion;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class PartidoController extends Controller
{
    public function index()
    {
        $id = 0;
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
        $input = $request->all();
        $partido = partido::find($id);
        $partido->campeonato_id = $request->campeonato_id;
        $partido->equipoA_id = $request->equipoA_id;
        $partido->equipoB_id = $request->equipoB_id;
        $partido->gol_equipoA = $request->gol_equipoA;
        $partido->gol_equipoB = $request->gol_equipoB;
        $partido->fecha_Par = $request->fecha_Par;
        $partido->hora = $request->hora;
        $partido->walkover = $request->walkover;
        $partido->detalle = $request->detalle;
        $partido->estado = $request->estado;
        $partido->tipo = $request->tipo;
        $partido->save();

        if ($partido->tipo == 1 || $partido->tipo == 4) {
            $puntos_eA = PuntosPartido::where("campeonato_id", $partido->campeonato_id)->where("equipo_id", $partido->equipoA_id)->where("partido_id", $partido->id)->get()->first();
            if (!$puntos_eA) {
                $puntos_eA = PuntosPartido::create([
                    "campeonato_id" => $request->campeonato_id,
                    "partido_id" => $partido->id,
                    "equipo_id" => $partido->equipoA_id,
                    "walkover" => 0,
                    "Pj" => 0,
                    "Pg" => 0,
                    "Pp" => 0,
                    "Pe" => 0,
                    "Gf" => 0,
                    "Gc" => 0,
                    "GD" => 0,
                ]);
            }

            $puntos_eB = PuntosPartido::where("campeonato_id", $partido->campeonato_id)->where("equipo_id", $partido->equipoB_id)->where("partido_id", $partido->id)->get()->first();
            if (!$puntos_eB) {
                $puntos_eB = PuntosPartido::create([
                    "campeonato_id" => $request->campeonato_id,
                    "partido_id" => $partido->id,
                    "equipo_id" => $partido->equipoB_id,
                    "walkover" => 0,
                    "Pj" => 0,
                    "Pg" => 0,
                    "Pp" => 0,
                    "Pe" => 0,
                    "Gf" => 0,
                    "Gc" => 0,
                    "GD" => 0,
                ]);
            }

            // ACTUALIZAR LOS PUNTOS DEL CAMPEONATO
            $goles_A = $partido->gol_equipoA;
            $goles_B = $partido->gol_equipoB;
            if ($goles_A > $goles_B) {
                // gano A
                $puntos_eA->Pj = 1;
                $puntos_eA->Pg = 1;
                $puntos_eA->Pp = 0;
                $puntos_eA->Pe = 0;
                $puntos_eA->Gf = (int)$partido->gol_equipoA;
                $puntos_eA->Gc = (int)$partido->gol_equipoB;
                $puntos_eA->GD = (int)$puntos_eA->Gf - $puntos_eA->Gc;

                $puntos_eB->Pj = 1;
                $puntos_eB->Pg = 0;
                $puntos_eB->Pp = 1;
                $puntos_eB->Pe = 0;
                $puntos_eB->Gf = (int)$partido->gol_equipoB;
                $puntos_eB->Gc = (int)$partido->gol_equipoA;
                $puntos_eB->GD = (int)$puntos_eB->Gf - $puntos_eB->Gc;
            } elseif ($goles_B > $goles_A) {
                // gano B
                $puntos_eB->Pj = 1;
                $puntos_eB->Pg = 1;
                $puntos_eB->Pp = 0;
                $puntos_eB->Pe = 0;
                $puntos_eB->Gf = (int)$partido->gol_equipoB;
                $puntos_eB->Gc = (int)$partido->gol_equipoA;
                $puntos_eB->GD = (int)$puntos_eB->Gf - $puntos_eB->Gc;

                $puntos_eA->Pj = 1;
                $puntos_eA->Pg = 0;
                $puntos_eA->Pp = 1;
                $puntos_eA->Pe = 0;
                $puntos_eA->Gf = (int)$partido->gol_equipoA;
                $puntos_eA->Gc = (int)$partido->gol_equipoB;
                $puntos_eA->GD = (int)$puntos_eA->Gf - $puntos_eA->Gc;
            } else {
                // empate
                $puntos_eA->Pj = 1;
                $puntos_eA->Pg = 0;
                $puntos_eA->Pp = 0;
                $puntos_eA->Pe = 1;
                $puntos_eA->Gf = (int)$partido->gol_equipoA;
                $puntos_eA->Gc = (int)$partido->gol_equipoB;
                $puntos_eA->GD = (int)$puntos_eA->Gf - $puntos_eA->Gc;

                $puntos_eB->Pj = 1;
                $puntos_eB->Pg = 0;
                $puntos_eB->Pp = 0;
                $puntos_eB->Pe = 1;
                $puntos_eB->Gf = (int)$partido->gol_equipoB;
                $puntos_eB->Gc = (int)$partido->gol_equipoA;
                $puntos_eB->GD = (int)$puntos_eB->Gf - $puntos_eB->Gc;
            }

            $puntos_eA->save();
            $puntos_eB->save();
            // FIN ACTUALIZAR
            $id = $request->campeonato_id;
            if ($partido->estado == 1) {
                if ($partido->grupo) {
                    TablaPosicionController::actualizar_posiciones_campeonato($partido->campeonato_id, $puntos_eA->equipo_id, $puntos_eB->equipo_id, $partido->grupo);
                } else {
                    TablaPosicionController::actualizar_posiciones_campeonato($partido->campeonato_id, $puntos_eA->equipo_id, $puntos_eB->equipo_id);
                }
            }
        }

        return redirect()->route("partidos.index")->with("bien", "Registro correcto");
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
        $input = $request->all();

        $partido = new partido();
        $partido->campeonato_id = intval($request->campeonato_id);
        $partido->equipoA_id = intval($request->equipoA_id);
        $partido->equipoB_id = intval($request->equipoB_id);
        $partido->save();

        $id = 'todos los partidos';
        $partidos = partido::all()->sortByDesc("fecha_Par");
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return redirect()->route("partidos.index")->with("bien", "Registro correcto");
    }
    public function generar($id, Request $request)
    {
        $sw = $request->sw;
        $campeonato = campeonato::find($id);
        $array_series = campeonato::series();
        $informacion_campeonato = $array_series[$campeonato->serie];

        // validar minimo de equipos
        $inscripciones = Inscripcion::select('equipo_id')->where('campeonato_id', $id)->get();
        $total_inscripciones = count($inscripciones);
        if ($total_inscripciones < $informacion_campeonato["min_equipos"]) {
            return redirect()->back()->with("info", "No es posible generar los partidos del campeonato " . $campeonato->nombre . ", debido a que el número de equipos inscritos (" . $total_inscripciones . ") es menor al requerido de " . $informacion_campeonato["min_equipos"] . " equipos");
        }

        // eliminar todos los partidos de una anterior generacion
        partido::Where('campeonato_id', '=', $id)->delete();

        // armar grupos
        $grupos = 1;
        $equipos_grupo = $total_inscripciones;
        if ($informacion_campeonato["grupos"]) {
            $grupos = $informacion_campeonato["nro_grupos"];
            $equipos_grupo = $total_inscripciones / $grupos;
        }
        $array_grupos = [
            1 => "A",
            2 => "B",
            3 => "C",
            4 => "D",
            5 => "E",
            6 => "F",
        ];

        for ($i = 1; $i <= $grupos; $i++) {
            $index = ($i - 1) * $equipos_grupo;
            $final_index = $equipos_grupo * $i;
            if ($i == $grupos) {
                $final_index = count($inscripciones);
            }
            // inicializar el array de equipos para enviar a la funcion para armar los partidos
            $equipos = [];
            for ($j = $index; $j < $final_index; $j++) {
                // asignar el ID del equipo al array
                $equipos[] = $inscripciones[$j]->equipo_id;
            }
            // REGISTRAR PARTIDOS
            $grupo = NULL;
            if ($grupos > 1) {
                $grupo = $array_grupos[$i];
            }
            if ($sw == 'tt') {
                PartidoController::todos_contra_todos($equipos, $campeonato->id, 1, $grupo);
            } else {
                PartidoController::ida_vuelta($equipos, $campeonato->id, 1, $grupo);
            }
        }

        $partidos = partido::all()->sortByDesc("fecha_Par");
        return redirect()->back()->with("bien", "Generación de partidos Todos vs Todos se realizó con éxito");
    }

    public function generar_segunda_ronda($id, Request $request)
    {
        partido::Where('campeonato_id', '=', $id)->where("tipo", 4)->delete();
        $sw = $request->sw;
        $campeonato = campeonato::find($id);

        $grupos = ["A", "B", "C", "D", "E", "F"];
        $equipos = [];
        $terceros = [];
        foreach ($grupos as $gp) {
            // obtener los 2 primeros de cada grupo
            $dos_mejores = TablaPosicion::where("campeonato_id", $campeonato->id)
                ->where("grupo", $gp)
                ->orderBy("puntos", "desc")
                ->orderBy("GD", "desc")
                ->get()->take(2)->pluck("equipo_id")->toArray();
            // agregar los dos primeros a los equipos de cuartos
            $equipos = array_merge($equipos, $dos_mejores);
        }
        // obtener los dos mejores terceros
        $terceros = TablaPosicion::where("campeonato_id", $campeonato->id)
            ->whereIn("grupo", $grupos)
            ->whereNotIn("equipo_id", $equipos)
            ->orderBy("puntos", "desc")
            ->orderBy("GD", "desc")
            ->get()->take(2)->pluck("equipo_id")->toArray();
        $equipos = array_merge($equipos, $terceros);

        $grupos = 2;
        $array_grupos = [
            1 => "1",
            2 => "2",
        ];
        $inscripciones = $equipos;
        $equipos_grupo = 7;
        for ($i = 1; $i <= $grupos; $i++) {
            $index = ($i - 1) * $equipos_grupo;
            $final_index = $equipos_grupo * $i;
            if ($i == $grupos) {
                $final_index = count($inscripciones);
            }
            // inicializar el array de equipos para enviar a la funcion para armar los partidos
            $equipos = [];
            for ($j = $index; $j < $final_index; $j++) {
                // asignar el ID del equipo al array
                $equipos[] = $inscripciones[$j];
            }
            // REGISTRAR PARTIDOS
            $grupo = NULL;
            if ($grupos > 1) {
                $grupo = $array_grupos[$i];
            }
            if ($sw == 'tt') {
                PartidoController::todos_contra_todos($equipos, $campeonato->id, 4, $grupo);
            } else {
                PartidoController::ida_vuelta($equipos, $campeonato->id, 4, $grupo);
            }
        }
        return redirect()->back()->with("bien", "Generación de partidos Todos vs Todos se realizó con éxito");
    }

    function buscarpartido(Request $request)
    {
        $id = $request->campeonato_id;
        $partidos = partido::where('campeonato_id', 'LIKE', $id)
            ->orderBy("fecha_Par", "desc")->get();
        $campeonato = campeonato::pluck('nombre', 'id');
        $equipo = equipoClub::pluck('name', 'id');
        return view('partidos.index', compact('partidos', 'campeonato', 'equipo', 'id'));
    }

    public function generar_cuartos($id)
    {
        $campeonato = campeonato::find($id);
        partido::where('campeonato_id', $id)->where("tipo", 3)->delete();
        $equipos = PartidoController::mejoresOcho($campeonato);
        PartidoController::generaPartidosUnicos($campeonato->id, $equipos, 3);

        return redirect()->back()->with("bien", "Generación de partidos Cuartos de final se realizó con éxito");
    }

    public static function mejoresOcho($campeonato)
    {
        $equipos = [];
        if ($campeonato->serie == "SERIE 1") {
            $equipos = TablaPosicion::where("campeonato_id", $campeonato->id)
                ->orderBy("puntos", "desc")
                ->orderBy("GD", "desc")
                ->get()->take(8)->pluck("equipo_id")->toArray();
        }

        if ($campeonato->serie == "SERIE 2") {
            $grupos = ["A", "B"];
            $equipos = [];
            foreach ($grupos as $gp) {
                $cuatro_mejores = TablaPosicion::where("campeonato_id", $campeonato->id)
                    ->where("grupo", $gp)
                    ->orderBy("puntos", "desc")
                    ->orderBy("GD", "desc")
                    ->get()->take(4)->pluck("equipo_id")->toArray();
                $equipos = array_merge($equipos, $cuatro_mejores);
            }
        }

        if ($campeonato->serie == "SERIE 3") {
            $grupos = ["A", "B", "C"];
            $equipos = [];
            $terceros = [];
            foreach ($grupos as $gp) {
                // obtener los 2 primeros de cada grupo
                $dos_mejores = TablaPosicion::where("campeonato_id", $campeonato->id)
                    ->where("grupo", $gp)
                    ->orderBy("puntos", "desc")
                    ->orderBy("GD", "desc")
                    ->get()->take(2)->pluck("equipo_id")->toArray();
                // agregar los dos primeros a los equipos de cuartos
                $equipos = array_merge($equipos, $dos_mejores);
            }
            // obtener los dos mejores terceros
            $terceros = TablaPosicion::where("campeonato_id", $campeonato->id)
                ->whereIn("grupo", $grupos)
                ->whereNotIn("equipo_id", $equipos)
                ->orderBy("puntos", "desc")
                ->orderBy("GD", "desc")
                ->get()->take(2)->pluck("equipo_id")->toArray();
            $equipos = array_merge($equipos, $terceros);
        }

        if ($campeonato->serie == "SERIE 6") {
            $grupos = ["1", "2"];
            $equipos = [];
            $terceros = [];
            foreach ($grupos as $gp) {
                // obtener los 4 primeros de cada grupo
                $dos_mejores = TablaPosicion::where("campeonato_id", $campeonato->id)
                    ->where("grupo", $gp)
                    ->orderBy("puntos", "desc")
                    ->orderBy("GD", "desc")
                    ->get()->take(4)->pluck("equipo_id")->toArray();
                $equipos = array_merge($equipos, $dos_mejores);
            }
        }

        return $equipos;
    }

    public function generarterceros($id)
    {
        partido::where('campeonato_id', 'LIKE', $id)->where('tipo', 'like', '3')->delete();
        $posiciones = TablaPosicion::all()->sortByDesc('puntos')->sortByDesc('Gd');

        $p1 = TablaPosicion::where('campeonato_id', 'LIKE', $id)
            ->orderBy("puntos", "desc")->orderBy("Gd", "desc")->skip(0)->take(1)->first();
        $p2 = TablaPosicion::where('campeonato_id', 'LIKE', $id)
            ->orderBy("puntos", "desc")->orderBy("Gd", "desc")->skip(1)->take(1)->first();
        $p3 = TablaPosicion::where('campeonato_id', 'LIKE', $id)
            ->orderBy("puntos", "desc")->orderBy("Gd", "desc")->skip(2)->take(1)->first();
        $p4 = TablaPosicion::where('campeonato_id', 'LIKE', $id)
            ->orderBy("puntos", "desc")->orderBy("Gd", "desc")->skip(3)->take(1)->first();
        $p5 = TablaPosicion::where('campeonato_id', 'LIKE', $id)
            ->orderBy("puntos", "desc")->orderBy("Gd", "desc")->skip(4)->take(1)->first();
        $p6 = TablaPosicion::where('campeonato_id', 'LIKE', $id)
            ->orderBy("puntos", "desc")->orderBy("Gd", "desc")->skip(5)->take(1)->first();

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
        $campeonato = campeonato::find($id);
        partido::where('campeonato_id', 'LIKE', $id)->where('tipo', 'like', '2')->delete();
        $partidos_cuartos = partido::where("campeonato_id", $id)->where("tipo", 3)->get();
        $ganadores = [];
        foreach ($partidos_cuartos as $partido) {
            // obtener el ganador
            if ($partido->gol_equipoA > $partido->gol_equipoB) {
                $ganadores[] = $partido->equipoA_id;
            } else {
                $ganadores[] = $partido->equipoB_id;
            }
        }
        PartidoController::generaPartidosUnicos($campeonato->id, $ganadores, 2);

        return redirect()->back()->with("bien", "Generación de partidos Semifinal se realizó con éxito");
    }
    public function final($id)
    {
        $campeonato = campeonato::find($id);
        partido::where('campeonato_id', 'LIKE', $id)->where('tipo', 'like', '0')->delete();
        $partidos_semifinales = partido::where("campeonato_id", $id)->where("tipo", 2)->get();
        $ganadores = [];
        foreach ($partidos_semifinales as $partido) {
            // obtener el ganador
            if ($partido->gol_equipoA > $partido->gol_equipoB) {
                $ganadores[] = $partido->equipoA_id;
            } else {
                $ganadores[] = $partido->equipoB_id;
            }
        }

        PartidoController::generaPartidosUnicos($campeonato->id, $ganadores, 0);
        return redirect()->back()->with("bien", "Generación del partido Final se realizó con éxito");
    }

    public function destroy($id)
    {
        partido::find($id)->delete();
        $id = 0;
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
        $partido = partido::where('campeonato_id', 'LIKE', $idf)->where('tipo', 'like', '0')->first();
        echo $partido . "<br>";
        if ($partido->gol_equipoA > $partido->gol_equipoB) {
            $pfinal = $partido->equipoA_id;
        } else {
            $pfinal = $partido->equipoB_id;
        }

        view()->share('partidos.pdf', $Inscrip, $campeonato, $equipo, $idf, $pfinal, $partido);

        $pdf = PDF::loadView('partidos.pdf', ['Inscrip' => $Inscrip, 'campeonato' => $campeonato, 'equipo' => $equipo, 'idf' => $idf, 'pfinal' => $pfinal, 'partido' => $partido]);

        return $pdf->stream('Report_' . $campeonato[$idf] . '.pdf');
    }

    public static function todos_contra_todos($equipos, $id, $tipo = 1, $grupo = NULL)
    {
        $total_equipos = count($equipos);
        $fechas_partidos = PartidoController::generaPartidosFecha($total_equipos, $equipos);

        foreach ($fechas_partidos as $partidos) {
            foreach ($partidos as $partido) {
                // registrar el partido
                partido::create([
                    "campeonato_id" => $id,
                    "equipoA_id" => $partido["e1"],
                    "equipoB_id" => $partido["e2"],
                    "tipo" => $tipo,
                    "grupo" => $grupo,
                    "fecha_Par" => $partido["fecha"],
                    "hora" => $partido["hora"],
                ]);
            }
        }
        return true;
    }

    public static function ida_vuelta($equipos, $id, $tipo = 1, $grupo = NULL)
    {
        $total_equipos = count($equipos);
        $fechas_partidos = PartidoController::generaPartidosFecha($total_equipos, $equipos);
        // IDA
        foreach ($fechas_partidos as $partidos) {
            foreach ($partidos as $partido) {
                // registrar el partido
                partido::create([
                    "campeonato_id" => $id,
                    "equipoA_id" => $partido["e1"],
                    "equipoB_id" => $partido["e2"],
                    "tipo" => $tipo,
                    "grupo" => $grupo
                ]);
            }
        }
        // VUELTA
        foreach ($fechas_partidos as $partidos) {
            foreach ($partidos as $partido) {
                // registrar el partido
                partido::create([
                    "campeonato_id" => $id,
                    "equipoA_id" => $partido["e2"],
                    "equipoB_id" => $partido["e1"],
                    "tipo" => $tipo,
                    "grupo" => $grupo
                ]);
            }
        }
        return true;
    }

    public static function generaPartidosFecha($total_equipos, $equipos)
    {
        $resultado_fechas = [];
        // detectar par/impar
        $par = true;
        if ($total_equipos % 2 != 0) {
            $par = false;
        }
        $fechas = $total_equipos - 1;
        $partidos_fecha = $total_equipos / 2;
        if (!$par) {
            $partidos_fecha = (int)(round(($total_equipos / 2), 0, PHP_ROUND_HALF_DOWN));
            $fechas = $total_equipos;
        }

        $ultimo_equipo = $total_equipos - 1;
        $penultimo_equipo = $total_equipos - 2; //el impar mas alto
        if (!$par) {
            $penultimo_equipo = $total_equipos - 1; //el impar mas alto
        }
        $index_equipo = 0;
        $sw_derecha = true;

        $fecha_partido = date("Y-m-d", strtotime(date("Y-m-d") . '+7 days'));
        $hora_partido = "08:00";

        for ($i = 0; $i < $fechas; $i++) {
            $partidos = [];
            // EQUIPOS PARES
            if ($par) {
                for ($j = 0; $j < $partidos_fecha; $j++) {
                    if ($j == 0) {
                        if ($sw_derecha) {
                            $partidos[] = [
                                "e1" => $equipos[$index_equipo],
                                "e2" => $equipos[$ultimo_equipo],
                                'fecha' => $fecha_partido,
                                "hora" => $hora_partido
                            ];
                        } else {
                            $partidos[] = [
                                "e1" => $equipos[$ultimo_equipo],
                                "e2" => $equipos[$index_equipo],
                                'fecha' => $fecha_partido,
                                "hora" => $hora_partido
                            ];
                        }
                        $sw_derecha = !$sw_derecha;
                    } else {
                        $partidos[] = [
                            "e1" => $equipos[$index_equipo],
                            "e2" => $equipos[$penultimo_equipo],
                            'fecha' => $fecha_partido,
                            "hora" => $hora_partido
                        ];
                        if ($penultimo_equipo > 0) {
                            $penultimo_equipo--;
                        } else {
                            $penultimo_equipo = $total_equipos - 2;
                        }
                    }
                    if ($index_equipo < $total_equipos - 2) {
                        $index_equipo++;
                    } else {
                        $index_equipo = 0;
                    }
                    if ($hora_partido < date("H:i", strtotime("17:30"))) {
                        $hora_partido = date("H:i", strtotime($hora_partido . '+120 minute'));
                    } else {
                        $hora_partido = "08:00";
                        $fecha_partido = date("Y-m-d", strtotime($fecha_partido . '+1 days'));
                    }
                }
            } else {
                // EQUIPOS IMPARES
                if ($i == 0) {
                    $index_equipo = 1;
                }
                for ($j = 0; $j < $partidos_fecha; $j++) {
                    $partidos[] = [
                        "e1" => $equipos[$index_equipo],
                        "e2" => $equipos[$penultimo_equipo],
                        'fecha' => $fecha_partido,
                        "hora" => $hora_partido
                    ];
                    if ($index_equipo + 1 <= $total_equipos - 1 && $equipos[$index_equipo + 1] == $equipos[$penultimo_equipo]) {
                        $index_equipo++;
                    }

                    $index_equipo++;

                    $penultimo_equipo--;
                    if ($penultimo_equipo == -1) {
                        $penultimo_equipo = $total_equipos - 1;
                    }
                    if ($index_equipo > $total_equipos - 1) {
                        $index_equipo = 0;
                    }

                    if ($hora_partido < date("H:i", strtotime("17:30"))) {
                        $hora_partido = date("H:i", strtotime($hora_partido . '+120 minute'));
                    } else {
                        $hora_partido = "08:00";
                        $fecha_partido = date("Y-m-d", strtotime($fecha_partido . '+1 days'));
                    }
                }
            }

            $resultado_fechas[] = $partidos;
        }
        return $resultado_fechas;
    }

    public static function generaPartidosUnicos($id, $equipos, $tipo = 1, $grupo = NULL)
    {
        $total_equipos = count($equipos);
        $total_partidos = $total_equipos / 2;
        $index_final = $total_equipos - 1;
        for ($i = 0; $i < $total_partidos; $i++) {
            partido::create([
                "campeonato_id" => $id,
                "equipoA_id" => $equipos[$i],
                "equipoB_id" => $equipos[$index_final],
                "tipo" => $tipo,
                "grupo" => $grupo
            ]);
            $index_final--;
        }
    }
}
