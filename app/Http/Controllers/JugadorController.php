<?php

namespace App\Http\Controllers;

use App\Models\equipoClub;
use App\Models\jugador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'nom'         => 'required',
            'apep'        => 'required',
            'apem'        => 'required',
            'ci'          => 'required',
            'ci_exp'      => 'required',
            'fecha_nac'   => 'required',
            'lugar_nac'   => 'required',
            'nacionalidad' => 'required',
            'nro_casaca'  => 'required',
            'fecha_afi'   => 'required',
            //foto
            'observacion'  => 'required',
            //qr
            'equipoclub_id' => 'required|exists:equipo_Clubs,id',
            'status'       => 'required',


        ]);
        $jugadorNew = new jugador();

        $jugadorNew->nom = mb_strtoupper($request->nom);
        $jugadorNew->apep = mb_strtoupper($request->apep);
        $jugadorNew->apem = mb_strtoupper($request->apem);
        $jugadorNew->ci = mb_strtoupper($request->ci);
        $jugadorNew->ci_exp = mb_strtoupper($request->ci_exp);
        $jugadorNew->fecha_nac = mb_strtoupper($request->fecha_nac);
        $jugadorNew->lugar_nac = mb_strtoupper($request->lugar_nac);
        $jugadorNew->nacionalidad = mb_strtoupper($request->nacionalidad);
        $jugadorNew->nro_casaca = $request->nro_casaca;
        $jugadorNew->fecha_afi = $request->fecha_afi;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = 'imagenes/fotos/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file('foto')->move($destinationPath, $filename);
            $jugadorNew->foto = $destinationPath . $filename;
        }
        $jugadorNew->observacion = $request->observacion;

        // codigo QR
        $codigo_qr = substr(mb_strtoupper($request->apep), 0, 1) . '|' . substr(mb_strtoupper($request->apem), 0, 1) . '|' . $request->ci;
        // fin codigo QR
        $nom_imagen = $request->ci . time() . ".png";
        $jugadorNew->qr = $nom_imagen;
        $jugadorNew->equipoclub_id = $request->equipoclub_id;
        $jugadorNew->status = $request->status;
        $jugadorNew->save();

        /* GENERAR CÓDIGO QR */
        $base_64 = base64_encode(\QrCode::format('png')->size(400)->generate($codigo_qr));
        $imagen_codigo_qr = base64_decode($base_64);
        file_put_contents(public_path() . '/imagenes/qr/' . $nom_imagen, $imagen_codigo_qr);

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
            'nom'         => 'required',
            'apep'        => 'required',
            'apem'        => 'required',
            'ci'          => 'required',
            'ci_exp'      => 'required',
            'fecha_nac'   => 'required',
            'lugar_nac'   => 'required',
            'nacionalidad' => 'required',
            'nro_casaca'  => 'required',
            'fecha_afi'   => 'required',
            //foto
            'observacion'  => 'required',
            //qr
            'equipoclub_id' => 'required|exists:equipo_Clubs,id',
            'status'       => 'required',


        ]);
        $jugadorNew = jugador::find($id);

        $jugadorNew->nom = mb_strtoupper($request->nom);
        $jugadorNew->apep = mb_strtoupper($request->apep);
        $jugadorNew->apem = mb_strtoupper($request->apem);
        $jugadorNew->ci = mb_strtoupper($request->ci);
        $jugadorNew->ci_exp = mb_strtoupper($request->ci_exp);
        $jugadorNew->fecha_nac = mb_strtoupper($request->fecha_nac);
        $jugadorNew->lugar_nac = mb_strtoupper($request->lugar_nac);
        $jugadorNew->nacionalidad = mb_strtoupper($request->nacionalidad);
        $jugadorNew->nro_casaca = $request->nro_casaca;
        $jugadorNew->fecha_afi = $request->fecha_afi;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $destinationPath = 'imagenes/fotos/';
            $filename = time() . '_' . $file->getClientOriginalName();
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

    public function getJugador(Request $request)
    {
        $filtro = $request->filtro;
        $valor = $request->valor;
        $jugador = null;

        switch ($filtro) {
            case 'id':
                $jugador = jugador::find($valor);
                break;
            case 'nom':
                $jugador = jugador::where(DB::raw('CONCAT(nom," ", apep," ", apem)'), 'LIKE', "%$valor%")->get()->first();
                break;
            case 'ci':
                $jugador = jugador::where("ci", $valor)->get()->first();
                break;
        }

        return response()->JSON($jugador);
    }
}
