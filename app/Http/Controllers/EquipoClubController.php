<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\equipoClub;
use Illuminate\Http\Request;

class EquipoClubController extends Controller
{
    public function index()
    {
        $equipos = equipoClub::all();
        $categoria = categoria::pluck('name', 'id');
        return view('equipos.index', compact('equipos', 'categoria'));
    }
    public function create()
    {
        $categoria = categoria::pluck('name', 'id');
        return view('equipos.create', compact('categoria'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'fecha_fund'=> 'required',
            'presidente'=> 'required',
            'vicepresidente'=> 'required',
            'color_camiseta'=> 'required',
            'color_pantalo'=> 'required',
            'color_medias'=> 'required',
            'direccion'=> 'required',
            'celular'=> 'required',
            'email'=> 'required',
            'observacion'=> 'required',
            'estado'=> 'required',
            'categoria_id'=>'required'

        ]);
        $equipoNew = new equipoClub();

        $equipoNew->name = $request->name;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = 'imagenes/logos/';
            $filename = time().'-'.$file->getClientOriginalName();
            $uploadSuccess = $request->file('logo')->move($destinationPath, $filename);
            $equipoNew->logo = $destinationPath . $filename;
        }
        $equipoNew->fecha_fund = $request-> fecha_fund;
        $equipoNew->presidente = $request->presidente;
        $equipoNew->vicepresidente = $request->vicepresidente;
        $equipoNew->color_camiseta = $request->color_camiseta;
        $equipoNew->color_pantalo = $request->color_pantalo;
        $equipoNew->color_medias = $request->color_medias;
        $equipoNew->direccion = $request->direccion;
        $equipoNew->celular = $request->celular;
        $equipoNew->email = $request->email;
        $equipoNew->observacion = $request->observacion;
        $equipoNew->estado = $request->estado;
        $equipoNew->categoria_id = $request->categoria_id;
        $equipoNew->save();

        return redirect()->route('equipos.index');
    }
    public function show()
    {


    }
    public function edit($id)
    {
        $equipo = equipoClub::find($id);
        $categoria = categoria::pluck('name', 'id');
        return view('equipos.editar', compact('id', 'equipo', 'categoria'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'fecha_fund'=> 'required',
            'presidente'=> 'required',
            'vicepresidente'=> 'required',
            'color_camiseta'=> 'required',
            'color_pantalo'=> 'required',
            'color_medias'=> 'required',
            'direccion'=> 'required',
            'celular'=> 'required',
            'email'=> 'required',
            'observacion'=> 'required',
            'estado'=> 'required',
            'categoria_id'=> 'required'

        ]);
        $equipoNew = equipoClub::find($id);

        $input = $request->all();
        $equipoNew->name = $request->name;
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $destinationPath = 'imagenes/logos/';
            $filename = time().'_'.$file->getClientOriginalName();
            $uploadSuccess = $request->file('logo')->move($destinationPath, $filename);

            $equipoNew->logo = $destinationPath . $filename;
        }

        $equipoNew->fecha_fund = $request-> fecha_fund;
        $equipoNew->presidente = $request->presidente;
        $equipoNew->vicepresidente = $request->vicepresidente;
        $equipoNew->color_camiseta = $request->color_camiseta;
        $equipoNew->color_pantalo = $request->color_pantalo;
        $equipoNew->color_medias = $request->color_medias;
        $equipoNew->direccion = $request->direccion;
        $equipoNew->celular = $request->celular;
        $equipoNew->email = $request->email;
        $equipoNew->observacion = $request->observacion;
        $equipoNew->estado = $request->estado;
        $equipoNew->categoria_id = $request->categoria_id;
        $equipoNew->save();

        return redirect()->route('equipos.index');
    }
    public function destroy($id)
    {
        equipoClub::find($id)->delete();
        return redirect()->route('equipos.index');
    }
}
