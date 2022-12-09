<?php

namespace App\Http\Controllers;

use App\Models\jugador;
use App\Models\JugadorEquipo;
use Illuminate\Http\Request;

class JugadorEquipoController extends Controller
{
    public $validacion = [
        "jugador_id" => "required",
        "equipo" => "required",
        "anio" => "required",
        "descripcion" => "nullable|min:4"
    ];

    public function index(jugador $jugador)
    {
        $jugador_equipos = $jugador->equipos;
        return view("jugador_equipos.index", compact("jugador", "jugador_equipos"));
    }

    public function create(jugador $jugador)
    {
        return view("jugador_equipos.create", compact("jugador"));
    }

    public function store(Request $request)
    {
        $request->validate($this->validacion);
        JugadorEquipo::create(array_map("mb_strtoupper", $request->all()));
        return redirect()->route('jugador_equipos.index', $request->jugador_id);
    }

    public function edit(JugadorEquipo $jugador_equipo)
    {
        return view("jugador_equipos.edit", compact("jugador_equipo"));
    }

    public function update(JugadorEquipo $jugador_equipo, Request $request)
    {
        $request->validate($this->validacion);
        $jugador_equipo->update(array_map("mb_strtoupper", $request->all()));
        return redirect()->route('jugador_equipos.index', $jugador_equipo->jugador_id);
    }

    public function destroy(JugadorEquipo $jugador_equipo)
    {
        $id = $jugador_equipo->jugador_id;
        $jugador_equipo->delete();
        return redirect()->route('jugador_equipos.index', $id);
    }
}
