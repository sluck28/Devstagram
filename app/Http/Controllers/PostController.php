<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
   //asi se autentica la vista a nuestro muro
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function index(){
     return view('dashboard');
   }
}
