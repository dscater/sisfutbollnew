<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function index()
    {
        $documentos = Documento::all();
        return view('documento.index', compact('documentos'));
    }

    public function listado(){
        $documentos = Documento::all();
        return view('documento.listado', compact('documentos'));
    }

    public function create()
    {
        return view('documento.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'contenido'=> 'required',
            'descripcion'=> 'required',
            'status'=> 'required'

        ]);
        $input=$request->all();
        $doc = Documento::create([
            'titulo' => $input['titulo'],
            'contenido'=> $input['contenido'],
            'descripcion'=> $input['descripcion'],
            'status'=> $input['status'],
        ]);


        return redirect()->route('documento.index');
    }
    public function editar($id)
    {
        $documentos = Documento::find($id);
        return view('documento.editar', compact('documentos', 'id'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'contenido'=> 'required',
            'descripcion'=> 'required',
            'status'=> 'required'

        ]);
        $input=$request->all();
        $campeonato = Documento::find($id);
        $campeonato->update($input);

        return redirect()->route('documento.index');
    }

    public function destroy($id)
    {
        Documento::find($id)->delete();
        return redirect()->route('documento.index');
    }
}
