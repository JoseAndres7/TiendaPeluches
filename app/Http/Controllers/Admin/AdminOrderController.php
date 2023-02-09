<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOrderController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Pagina Admin - Pedidos - Tienda peluches";
        $viewData["orders"] = Order::all();
        return view('admin.order.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        order::validate($request);

        $newOrder = new order();
        $newOrder->setTotal($request->input('total'));
        $newOrder->setUserId($request->input('user_id'));
        $newOrder->save();

        return back();
    }

    public function delete($id)
    {
        Order::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Pagina Admin - Editar Pedido - Tienda peluches";
        $viewData["order"] = Order::findOrFail($id);
        return view('admin.order.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Order::validate($request);

        $order = Order::findOrFail($id);
        $order->setTotal($request->input('total'));
        $order->setUserId($request->input('user_id'));

        $order->save();
        return redirect()->route('admin.order.index');
    }
}
