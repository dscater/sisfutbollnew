<?php

namespace App\Http\Controllers;

use App\Models\jugador;
use App\Models\sancion;
use Illuminate\Http\Request;

class SancionController extends Controller
{
    public function index()
    {
        $sanciones = sancion::all();
        return view('sanciones.index', compact('sanciones'));
    }
    public function create()
    {
        $jugadores = jugador::all();
        $array_jugadores[""] = "Seleccione...";
        foreach ($jugadores as $value) {
            $array_jugadores[$value->id] = $value->full_name;
        }
        return view('sanciones.create', compact("array_jugadores"));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'jugador_id' => 'required',
            'tarjeta' => 'required',
        ]);
        $input = $request->all();
        $doc = sancion::create([
            'jugador_id' => $input['jugador_id'],
            'tarjeta' => $input['tarjeta'],
        ]);

        return redirect()->route('sanciones.index');
    }
    public function editar($id)
    {
        $sancion = sancion::find($id);
        $jugadores = jugador::all();
        $array_jugadores[""] = "Seleccione...";
        foreach ($jugadores as $value) {
            $array_jugadores[$value->id] = $value->full_name;
        }
        return view('sanciones.editar', compact('sancion', "array_jugadores"));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'jugador_id' => 'required',
            'tarjeta' => 'required',
        ]);

        $input = $request->all();
        $campeonato = sancion::find($id);
        $campeonato->update($input);

        return redirect()->route('sanciones.index');
    }

    public function destroy($id)
    {
        sancion::find($id)->destroy();
        $sanciones = sancion::all();
        return view('sanciones.index', compact('sanciones'));
    }
}
