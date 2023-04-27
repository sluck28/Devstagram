<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request,User $user,Post $post)
    {
        // dd('desde comentario controller');

        //validamos el comentario
        $this->validate(request(), [
           
            'comentario' => 'required | max:255'
        ]);

        //validamos el comentario
        Comentario::create([
            'user_id'=>auth()->user()->id,
            'comentario'=>$request->comentario,
            'post_id'=>$post->id
        ]);
        //return back para regresarlo ala pagina donde creo el comentario
        return back()->with('mensaje', 'comentario realizado correctamente'); 
        
    }
}
