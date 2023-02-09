<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminItemController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Pagina Admin - Usuarios - Tienda peluches";
        $viewData["items"] = Item::all();
        return view('admin.item.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        item::validate($request);

        $newItem = new item();
        $newItem->setQuantity($request->input('quantity'));
        $newItem->setPrice($request->input('price'));
        $newItem->setOrderId($request->input('order_id'));
        $newItem->setProductId($request->input('procuct_id'));
        $newItem->save();

        return back();
    }

    public function delete($id)
    {
        Item::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Pagina Admin - Editar Items - Tienda peluches";
        $viewData["item"] = Item::findOrFail($id);
        return view('admin.item.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        Item::validate($request);

        $item = Item::findOrFail($id);
        $item->setQuantity($request->input('quantity'));
        $item->setPrice($request->input('price'));
        $item->setOrderId($request->input('order_id'));
        $item->setProductId($request->input('product_id'));

        $item->save();
        return redirect()->route('admin.item.index');
    }
}
