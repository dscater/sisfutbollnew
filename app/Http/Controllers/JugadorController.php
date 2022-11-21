<?php

namespace App\Http\Controllers;

use App\Models\equipoClub;
use App\Models\jugador;
use Illuminate\Http\Request;

class JugadorController extends Controller
{
    public function index()
    {
        $equipos = equipoClub::pluck('name', 'id')->all();
        $jugadores = jugador::all();
        return view('jugadores.index', compact('equipos', 'jugadores'));
    }
    public function create()
    {
        $equipos = equipoClub::pluck('name', 'id')->all();
        return view('jugadores.create', compact('equipos'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom'         =>'required',
            'apep'        =>'required',
            'apem'        =>'required',
            'ci'          =>'required',
            'ci_exp'      =>'required',
            'fecha_nac'   =>'required',
            'lugar_nac'   =>'required',
            'nacionalidad'=>'required',
            'nro_casaca'  =>'required',
            'fecha_afi'   =>'required',
            //foto
            'observacion'  =>'required',
            //qr
            'equipoclub_id'=>'required|exists:equipo_Clubs,id',
            'status'       =>'required',


        ]);
        $jugadorNew = new jugador();

        $jugadorNew->nom=$request->nom;
        $jugadorNew->apep=$request->apep;
        $jugadorNew->apem=$request->apem;
        $jugadorNew->ci=$request->ci;
        $jugadorNew->ci_exp=$request->ci_exp;
        $jugadorNew->fecha_nac=$request->fecha_nac;
        $jugadorNew->lugar_nac=$request->lugar_nac;
        $jugadorNew->nacionalidad=$request->nacionalidad;
        $jugadorNew->nro_casaca=$request->nro_casaca;
        $jugadorNew->fecha_afi=$request->fecha_afi;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = 'imagenes/fotos/';
            $filename = time().'-'.$file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename);
            $jugadorNew->foto = $destinationPath . $filename;
        }
        $jugadorNew->observacion = $request->observacion;
        $jugadorNew->qr = $request->qr;
        $jugadorNew->equipoclub_id = $request->equipoclub_id;
        $jugadorNew->status = $request->status;
        $jugadorNew->save();

        return redirect()->route('jugadores.index');
    }
    public function show()
    {

    }
    public function edit($id)
    {
        $jugador = jugador::find($id);
        $equipos = equipoClub::pluck('name', 'id')->all();
        return view('jugadores.editar', compact('id', 'jugador', 'equipos'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom'         =>'required',
            'apep'        =>'required',
            'apem'        =>'required',
            'ci'          =>'required',
            'ci_exp'      =>'required',
            'fecha_nac'   =>'required',
            'lugar_nac'   =>'required',
            'nacionalidad'=>'required',
            'nro_casaca'  =>'required',
            'fecha_afi'   =>'required',
            //foto
            'observacion'  =>'required',
            //qr
            'equipoclub_id'=>'required|exists:equipo_Clubs,id',
            'status'       =>'required',


        ]);
        $jugadorNew =jugador::find($id);

        $jugadorNew->nom=$request->nom;
        $jugadorNew->apep=$request->apep;
        $jugadorNew->apem=$request->apem;
        $jugadorNew->ci=$request->ci;
        $jugadorNew->ci_exp=$request->ci_exp;
        $jugadorNew->fecha_nac=$request->fecha_nac;
        $jugadorNew->lugar_nac=$request->lugar_nac;
        $jugadorNew->nacionalidad=$request->nacionalidad;
        $jugadorNew->nro_casaca=$request->nro_casaca;
        $jugadorNew->fecha_afi=$request->fecha_afi;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = 'imagenes/fotos/';
            $filename = time().'_'.$file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename);
            $jugadorNew->foto = $destinationPath . $filename;
        }
        $jugadorNew->observacion = $request->observacion;
        $jugadorNew->qr = $request->qr;
        $jugadorNew->equipoclub_id = $request->equipoclub_id;
        $jugadorNew->status = $request->status;
        $jugadorNew->save();

        return redirect()->route('jugadores.index');
    }
    public function destroy($id)
    {
        jugador::find($id)->delete();
        return redirect()->route('jugadores.index');
    }
}
