<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
   //asi se autentica la vista a nuestro muro
   public function __construct()
   {
      $this->middleware('auth');
   }

   public function index(User $user)
   {
       
      return view('dashboard',
      [
         'user'=>$user
      ]
   );
   }

   public function store(Request $request){
     // dd('creando post');
     $this->validate($request,[
       'title' =>'required',
       'description' =>'required',
       'image' =>'required'
     ]);
   }

   public function create()
   {
      return view('post.create');
   }
}
