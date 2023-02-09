<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Inicio - Tienda peluches";
        $viewData["products"] = Product::paginate(3);
        return view('home.index')->with("viewData", $viewData);
    }

    public function about()
    {
        $viewData = [];
        $viewData["title"] = "Sobre nosotros - Tienda peluches";
        $viewData["subtitle"] =  "Sobre nosotros";
        $viewData["description"] =  "This is an about page ...";
        $viewData["author"] = "Desarrollado por: José Manuel Pastor Lledó";
        return view('home.about')->with("viewData", $viewData);
    }
}
