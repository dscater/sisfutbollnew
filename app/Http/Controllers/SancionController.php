<?php

namespace App\Http\Controllers;

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
        return view('sanciones.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'detalle'=> 'required',
        ]);
        $input=$request->all();
        $doc = sancion::create([
            'nombre' => $input['nombre'],
            'detalle'=> $input['detalle'],
        ]);


        return redirect()->route('sanciones.index');
    }
    public function editar($id)
    {
        $sanciones = sancion::find($id);
        return view('sanciones.editar', compact('sanciones', 'id'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'detalle'=> 'required',
        ]);
        
        $input=$request->all();
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
