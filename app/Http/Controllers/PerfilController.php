<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd('aqui se muestra el formulario');
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        # code...
        // dd('guardando cambios');
        $request->request->add(['username'=>Str::slug($request->username)]);
        $this->validate($request,[
            'username'=>'required|unique:users|min:8|max:20|not_in:twitter',
        ]);

        if($request->imagen){
            dd('Si hay imagen');
        }else{
            dd('no hay imagen');
        }
    }
}
