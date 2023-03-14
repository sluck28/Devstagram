<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    public function index(){
        return view('auth.login');
    }
    //aqui autenticamos nuestro login
    public function store(Request $request){

        //para mantener nuestra sesion siempre abierta
        
        $this->validate($request,
            [
                'email'=>'required|email',
                'password'=>'required'
            ]
                    
        );
        //asi se valida para saber si un usuario esta autenticado
        if(!auth()->attempt($request->only('email','password'),$request->remember)){//agregamos $request->remember para mantener la sesion abierta y nos cree un token
            return back()->with('mensaje','Credenciales incorrectas');

        }
        //aqui lo redirigimos al muro
        return redirect()->route('post.index');

    }
}

    