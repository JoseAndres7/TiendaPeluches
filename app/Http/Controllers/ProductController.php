<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Productos - Tienda peluches";
        $viewData["subtitle"] =  "Peluches de Pokèmon más vendidos";
        $viewData["products"] = Product::paginate(6);

        return view('product.index')->with("viewData", $viewData);
    }

    public function paginacion()
    {
        $viewData = [];
        $viewData["title"] = "Productos - Tienda peluches";
        $viewData["subtitle"] =  "Lista de productos";
        $viewData["products"] = Product::paginate(6);
        return view('product.paginacion')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName()."Peluche - Tienda peluches";
        $viewData["subtitle"] =  $product->getName()." - Información del producto";
        $viewData["product"] = $product;
        $viewData["user"] = Auth::user() != null ? Auth::user()->getId() : null;

        if (Auth::user() != null) {
            $iduser = Auth::user()->getId();
            $viewData["orders"] = Order::all()->where('user_id', '=', $iduser);

            //buble for que recorra lasa ids almacenadas en las orders y las compare con las ids de los items

            for ($i = 0; $i < count($viewData["orders"]); $i++) {
                $idorder = $viewData["orders"][$i]->getId();
                $viewData["item"] = Item::all()->where('product_id', '=', $id)->where('order_id', '=', $idorder);
                if ($viewData["item"] != "[]") {
                    break;
                }
            }
        } else {
            $viewData["item"] = null;
        }
        $viewData["comentUser"] = Comentario::all()->where('user_id', '=', $viewData["user"])->where('product_id', '=', $id);
        $viewData["comentarios"] = Comentario::all()->where('product_id', '=' , $id);
        return view('product.show')->with("viewData", $viewData);
    }
}
