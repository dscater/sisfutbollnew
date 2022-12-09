<?php

namespace App\Http\Controllers;

use App\Models\campeonato;
use App\Models\equipoClub;
use App\Models\Inscripcion;
use Illuminate\Http\Request;

class CampeonatoController extends Controller
{
    public function index()
    {
        $camp = campeonato::all();
        return view('campeonato.index', compact('camp'));
    }
    public function create()
    {
        return view('campeonato.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'descripcion' => 'required',
            'serie' => 'required',
            'estado' => 'required'

        ]);
        $input = $request->all();
        $campeonato = campeonato::create([
            'nombre' => $input['nombre'],
            'fecha_inicio' => $input['fecha_inicio'],
            'fecha_fin' => $input['fecha_fin'],
            'descripcion' => $input['descripcion'],
            'serie' => $input['serie'],
            'estado' => $input['estado'],
        ]);

        return redirect()->route('campeonato.index');
    }
    public function show()
    {
    }
    public function edit($id)
    {
        $campeonato = campeonato::find($id);
        return view('campeonato.editar', compact('campeonato'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'descripcion' => 'required',
            'serie' => 'required',
            'estado' => 'required'

        ]);
        $input = $request->all();
        $campeonato = campeonato::find($id);
        $campeonato->update($input);

        return redirect()->route('campeonato.index');
    }
    public function destroy($id)
    {
        campeonato::find($id)->delete();
        return redirect()->route('campeonato.index');
    }

    public function equipos_campeonato(Request $request)
    {
        $inscripcions = Inscripcion::where("campeonato_id", $request->id)->get();
        $html = '<option value="">Seleccione...</option>';
        foreach ($inscripcions as $inscripcion) {
            $html .= '<option value="' . $inscripcion->equipo_id . '">' . $inscripcion->equipoClubs->name . '</option>';
        }
        return response()->JSON($html);
    }
}
