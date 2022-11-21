<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function welcome()
    {
        //
        $noticias = Noticia::all();
        $tab = "";
        for ($i=0; $i < count($noticias); $i++) {
            $tab.='{
                "id":"'.$noticias[$i]->{"id"}.'",
                "contenido":"'.$noticias[$i]->{"contenido"}.'",
                "descripcion":"'.$noticias[$i]->{"descripcion"}.'",
                "status":"'.$noticias[$i]->{"status"}.'",
            },';
        }
        $datosjson = substr($tab, 0, strlen($tab)-1);
        $formatoJson = '{"ragistrosM":['.$datosjson.']}';
        $varj = json_encode($noticias);
        echo $varj;

    }
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticia.index', compact('noticias'));
    }
    public function create()
    {
        return view('noticia.create');
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
        $doc = Noticia::create([
            'titulo' => $input['titulo'],
            'contenido'=> $input['contenido'],
            'descripcion'=> $input['descripcion'],
            'status'=> $input['status'],
        ]);


        return redirect()->route('noticia.index');
    }
    public function editar($id)
    {
        $noticias = Noticia::find($id);
        return view('noticia.editar', compact('noticias', 'id'));
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
        //$campeonato = campeonato::find($id);
        //$campeonato->update($input);

        return redirect()->route('noticia.index');
    }

    public function destroy($id)
    {
        Noticia::find($id)->delete();
        return redirect()->route('noticia.index');
    }

}
