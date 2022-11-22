<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\equipoClub;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        categoria::create($request->all());

        return redirect()->route("categorias.index");
    }

    public function edit(categoria $categoria)
    {
        return view('categorias.edit', compact("categoria"));
    }

    public function update(categoria $categoria, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $categoria->update($request->all());
        return redirect()->route("categorias.index");
    }

    public function destroy(categoria $categoria)
    {
        $usado = equipoClub::where("categoria_id", $categoria->id)->get();
        if (count($usado) > 0) {
            return redirect()->route("categorias.index")->with("error", "No se puede eliminar el registro porque esta siendo utilizado");
        }
        $categoria->delete();
        return redirect()->route("categorias.index");
    }
}
