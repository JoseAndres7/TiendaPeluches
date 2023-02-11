<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class MyAccountController extends Controller
{
    public function orders()
    {
        $viewData = [];
        $viewData["title"] = "Mis pedidos - Tienda peluches";
        $viewData["subtitle"] =  "Mis pedidos";
        $viewData["orders"] = Order::with(['items.product'])->where('user_id', Auth::user()->getId())->get();
        $viewData["products"] = Product::all();
        return view('myaccount.orders')->with("viewData", $viewData);
    }
}
