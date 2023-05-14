<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post){
        //  dd($request->user()->id);

        //aqui mandamos a crear nuestro like con solo guardar el user_id del usuario

        $post->likes()->create([
            'user_id'=>$request->user()->id
        ]);

        //return back nos regresa al lugar de la petición
        return back();

    }


    public function destroy(Request $request, Post $post)
    {
        // dd('eliminando like');
        //aqui mandamos a eliminar el like que el usuario le dio al post con la relacion de likes
        $request->user()->likes()->where('post_id', $post->id)->delete();
           return back(); 
    }
}
