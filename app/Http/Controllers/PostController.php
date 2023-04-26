<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
       //para traer las publicaciones de un solo usuario
      //hacer la paginacion con laravel usamos paginate
       $post=Post::where('user_id',$user->id)->paginate(20);
      //  dd($post);
      return view('dashboard',
      [
         'user'=>$user,
         //manera de retornar la variabel de post
         'post'=>$post	
      ]
   );
   }

   public function store(Request $request){
     //estas son mis validaciones
     $this->validate($request,[
       'title' =>'required',
       'description' =>'required',
       'image' =>'required',
     
     ]);

     //aqui guardare los datos del post
     Post::create([
       'title' => $request->title,
       'description' => $request->description,
       'image' => $request->image,
       'user_id' =>auth()->user()->id
     ]);


     return redirect()->route('post.index',auth()->user()->username);
   }

   public function create()
   {
      return view('post.create');
   }

   
}
