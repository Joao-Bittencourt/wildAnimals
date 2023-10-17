<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller {

    public function login() {
        return view('users.login');
    }

    public function logout() {
        Session::flush();

        return redirect('/');
    }

    public function dologin(Request $request) {

        $this->validate($request, [
            'usuario' => 'required',
            'password' => 'required'
        ]);

        //verificar se o usuário existe
        $usuario = DB::table('users')
                ->where('usuario', '=', $request->usuario)
                ->where('usuario', '=', Hash::make($request->password))
                ->first();
        dd($usuario);
        if (!Hash::check($request->password, $usuario->password)) {
            return Redirect('/login')->with('erros', 'A senha e/ou usuario estão incorretos!');
        }
        
        //abrir session usuarios
        Session::put('login', 'sim');
        Session::put('usuario', $usuario->usuario);
        Session::put('nome', $usuario->nome);
        Session::put('iduser', $usuario->id);
        Session::put('email', $usuario->email);

        return Redirect('/player-animals');
    }

    
}
