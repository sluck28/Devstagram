<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //para cerrar sesion utilizando aut
    public function store(){
        
        auth()->logout();
       return  redirect()->route('login');
    }
}
