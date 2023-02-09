<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Pagina Admin - Usuarios - Tienda peluches";
        $viewData["users"] = User::all();
        return view('admin.user.index')->with("viewData", $viewData);
    }

    public function store(Request $request)
    {
        user::validate($request);

        $newUser = new user();
        $newUser->setName($request->input('name'));
        $newUser->setEmail($request->input('email'));
        $newUser->setRole($request->input('role'));
        $newUser->save();

        return back();
    }

    public function delete($id)
    {
        User::destroy($id);
        return back();
    }

    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Pagina Admin - Editar Usuario - Tienda peluches";
        $viewData["user"] = User::findOrFail($id);
        return view('admin.user.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        User::validate($request);

        $user = User::findOrFail($id);
        $user->setName($request->input('name'));
        $user->setEmail($request->input('email'));
        if ($request->input('password2') == ""){
            $user->setPassword($user->getPassword());
        } else {
            $user->setPassword(Hash::make($request->input('password2')));
        }
        $user->setRole($request->input('role'));
        $user->setBalance($request->input('balance'));

        $user->save();
        return redirect()->route('admin.user.index');
    }
}