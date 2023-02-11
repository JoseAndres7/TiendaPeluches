<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


public function index()
    {
        $viewData = [];
        $viewData["title"] = "Usuario - Tienda peluches";
        $viewData["subtitle"] =  "Datos del usuario";
        $viewData["usuario"] = Auth::user();

        return view('user.index')->with("viewData", $viewData);
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
        if($image = $request->file('imagen')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "_" . $image->getClientOriginalName();
            $image->move($destinationPath, $profileImage);
            $user->setImagen($profileImage);
        }
        $user->setRole($request->input('role'));
        $user->setBalance($request->input('balance'));

        $user->save();
        return redirect()->route('home.index');
    }
}