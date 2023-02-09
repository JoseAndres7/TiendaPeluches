<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{

    public function show($id)
    {
        $viewData = [];
        $viewData["comentarios"] = Comentario::select('SELECT * FROM Comentarios WHERE product_id = $id');
        return view('product.show')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {

        Comentario::validate($request);

        $newComentario = new Comentario();
        $newComentario->setDescripcion($request->input('descripcion'));
        $newComentario->setValoracion($request->input('valoracion'));
        $newComentario->setProductId($request->input('product_id'));
        $newComentario->setUserId($request->input('user_id'));
        $newComentario->save();

        return redirect()->route('product.show', ['id' => $request->input('product_id')]);

    }

}