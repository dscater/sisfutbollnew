<?php

namespace App\Http\Controllers;

use App\Models\campeonato;
use App\Models\categoria;
use App\Models\equipoClub;
use App\Models\Inscripcion;
use App\Models\TablaPosicion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class InscripcionController extends Controller
{
    public function index($id)
    {
        $campeonatos = campeonato::pluck('nombre', 'id')->all();
        $equipos = equipoClub::pluck('name', 'id')->all();
        $equiposca = equipoClub::pluck('categoria_id', 'id')->all();

        $categorias = categoria::pluck('name', 'id')->all();
        $inscrip = Inscripcion::select('id', 'campeonato_id', 'equipo_id', 'observacion')
            ->where('campeonato_id', 'LIKE', $id)
            ->get();

        $fact = Inscripcion::Where('campeonato_id', $id)
            ->select(DB::raw('COUNT(equipo_id) as n'))
            ->groupBy('campeonato_id')->get();

        if ($fact->isEmpty()) {
            $comb = '0';
        }
        foreach ($fact as $fac) {

            $fac1 = 1;
            for ($i = 1; $i <= intval($fac->n); $i++) {
                $fac1 = $fac1 * $i;
            }
            $fac2 = 1;
            for ($i = 1; $i <= intval($fac->n) - 2; $i++) {
                $fac2 = $fac2 * $i;
            }
            $comb = $fac1 / ($fac2 * 2);
        }

        return view('inscripcion.index', compact('inscrip', 'campeonatos', 'equipos', 'categorias', 'equiposca', 'id', 'comb', 'fact'));
    }
    public function create($id)
    {
        $campeonatos = campeonato::pluck('nombre', 'id')->all();
        $equipos = equipoClub::pluck('name', 'id')->all();
        return view('inscripcion.create', compact('campeonatos', 'equipos', 'id'));
    }
    public function store(Request $request, $id)
    {
        $this->validate($request, [
            'campeonato_id' => 'required||exists:campeonatos,id',
            'equipo_id' => ['required', Rule::unique('inscripcions')->where(function ($query) use ($request) {
                return $query
                    ->where('equipo_id', $request->equipo_id)
                    ->where('campeonato_id', $request->campeonato_id);
            })],
        ]);

        $input = $request->all();
        $inscripcion = Inscripcion::create([
            'campeonato_id' => $input['campeonato_id'],
            'equipo_id' => $input['equipo_id'],
            'observacion' => $input['observacion']
        ]);

        $posicion = TablaPosicion::create([
            'campeonato_id' => $input['campeonato_id'],
            'equipo_id' => $input['equipo_id'],
        ]);

        $campeonatos = campeonato::pluck('nombre', 'id')->all();
        $equipos = equipoClub::pluck('name', 'id')->all();
        $equiposca = equipoClub::pluck('categoria_id', 'id')->all();

        $categorias = categoria::pluck('name', 'id')->all();
        $inscrip = Inscripcion::select('id', 'campeonato_id', 'equipo_id', 'observacion')
            ->where('campeonato_id', 'LIKE', $id)
            ->get();

        $fact = Inscripcion::Where('campeonato_id', $id)
            ->select(DB::raw('COUNT(equipo_id) as n'))
            ->groupBy('campeonato_id')->get();


        foreach ($fact as $fac) {
            $fac1 = 1;
            for ($i = 1; $i <= intval($fac->n); $i++) {
                $fac1 = $fac1 * $i;
            }
            $fac2 = 1;
            for ($i = 1; $i <= intval($fac->n) - 2; $i++) {
                $fac2 = $fac2 * $i;
            }
            $comb = $fac1 / ($fac2 * 2);
        }
        if ($comb = null) {
            $comb = 0;
        }

        return redirect()->route('inscripcion.index', $id);
    }
    public function show()
    {
    }
    public function edit($id)
    {

        return view('inscripcion.editar');
    }
    public function update(Request $request, $id)
    {


        return redirect()->route('inscripcion.index');
    }
    public function destroy($id)
    {
        $equipoid = Inscripcion::where('id', '=', $id)->select("equipo_id", "campeonato_id")->get();
        $campeonato = campeonato::find($equipoid[0]->campeonato_id);
        foreach ($equipoid as $equipo) {
            TablaPosicion::Where('equipo_id', $equipo->equipo_id)->where('campeonato_id', $equipo->campeonato_id)->delete();
        }

        Inscripcion::find($id)->delete();
        return redirect()->route('inscripcion.index', $campeonato->id);
    }
}
