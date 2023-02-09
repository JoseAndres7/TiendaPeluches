<?php

namespace App\Http\Controllers\Admin;

use App\Models\Comentario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminComentarioController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Pagina Admin - Comentarios - Tienda peluches";
        $viewData["comentarios"] = Comentario::all();
        return view('admin.comentario.index')->with("viewData", $viewData);
    }


    public function delete($id)
    {
        Comentario::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Pagina Admin - Editar Comentario - Tienda peluches";
        $viewData["comentario"] = Comentario::findOrFail($id);
        return view('admin.comentario.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Comentario::validate($request);

        $comentario = Comentario::findOrFail($id);
        $comentario->setDescripcion($request->input('descripcion'));

        $comentario->save();
        return redirect()->route('admin.comentario.index');
    }
}
