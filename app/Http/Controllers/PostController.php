<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
   //asi se autentica la vista a nuestro muro
   public function __construct()
   {
      //con except podemos decirle a que pagina si puede tener acceso un usuario no autenticado
      $this->middleware('auth')->except(['show','index']);
   }

   public function index(User $user)
   {
       //para traer las publicaciones de un solo usuario
      //hacer la paginacion con laravel usamos paginate
       $post=Post::where('user_id',$user->id)->latest()->paginate(20);
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
   //para mostrar una publicacion
   public function show(User $user,Post $post)
   {
    //asi retornamos nuestra variable para mostrar los posts
     return view('post.show',[
         'post'=>$post,
         'user'=>$user
     ]);
   }

   //El metodo destroy es para eliminar algun dato de la base de datos
   public function destroy(Post $post)
   {
      //  dd('eliminando',$post->id);
      $this->authorize('delete',$post);
      $post->delete();

      //para eliminar la imagen
      $imagen_path= public_path('uploads/' . $post->image);

      if(File::exists($imagen_path)){
        unlink($imagen_path);

      }
      return redirect()->route('post.index',auth()->user()->username);

   }
}

