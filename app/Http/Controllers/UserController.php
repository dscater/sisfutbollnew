<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public $validacion = [
        "name" => "required",
        "email" => "required|email|unique:users,email",
        "tipo" => "required"
    ];
    public $messages = [];
    public function index()
    {
        $users = User::where("id", "!=", 1)->get();
        return view("users.index", compact("users"));
    }

    public function create()
    {
        return view("users.create");
    }

    public function store(Request $request)
    {
        $this->validacion["password"] = "required|min:4";
        $request->validate($this->validacion);
        $user = User::create(array_map("mb_strtoupper", $request->all()));
        $user->password = Hash::make($user->password);
        $user->email = mb_strtolower($user->email);
        $user->save();
        return redirect()->route("users.index")->with("bien", "Registro exitoso");
    }

    public function edit(User $user)
    {
        return view("users.edit", compact("user"));
    }

    public function update(User $user, Request $request)
    {
        $this->validacion["email"] = "required|email|unique:users,email," . $user->id;
        $request->validate($this->validacion);
        $user->update(array_map("mb_strtoupper", $request->all()));
        $user->password = Hash::make($user->password);
        $user->email = mb_strtolower($user->email);
        $user->save();
        return redirect()->route("users.index")->with("bien", "Actualización exitosa");
    }

    public function show(User $user)
    {
        return view("users.show", compact("user"));
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("users.index")->with("bien", "Eliminación exitosa");
    }
}
