<?php

namespace App\Http\Controllers;

use App\Models\campeonato;
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
            'fecha_inicio'=> 'required',
            'fecha_fin'=> 'required',
            'descripcion'=> 'required',
            'estado'=> 'required'

        ]);
        $input=$request->all();
        $campeonato = campeonato::create([
            'nombre' => $input['nombre'],
            'fecha_inicio'=> $input['fecha_inicio'],
            'fecha_fin'=> $input['fecha_fin'],
            'descripcion'=> $input['descripcion'],
            'estado'=> $input['estado'],
        ]);

        return redirect()->route('campeonato.index');
    }
    public function show()
    {

    }
    public function edit($id)
    {
        $campeonato = campeonato::where('id','like', $id)->get();
        $camp = $campeonato;
        return view('campeonato.editar', compact('campeonato', 'camp', 'id'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'fecha_inicio'=> 'required',
            'fecha_fin'=> 'required',
            'descripcion'=> 'required',
            'estado'=> 'required'

        ]);
        $input=$request->all();
        $campeonato = campeonato::find($id);
        $campeonato->update($input);

        return redirect()->route('campeonato.index');
    }
    public function destroy($id)
    {
        campeonato::find($id)->delete();
        return redirect()->route('campeonato.index');
    }

}
