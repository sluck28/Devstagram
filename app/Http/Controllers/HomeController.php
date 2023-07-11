<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //utilizamos invoke cuando solo utilizamos un solo metodo en nuestro controlador
    public function __invoke()
    {
        //obtener a quienes seguimos
        //utilizamos pluck para traer solo algunos datos de nuestro arreglo y to array
        //para combertirlo en un arreglo
        $ids = auth()->user()->followings->pluck('id')->toArray();
        //filtramos con una consulta de whereIn que nos permite traer datos de un arreglo
        //paginate para paginar los post dependiendo del numero
        $posts = Post::whereIn('user_id', $ids)->paginate(20);
        //pasamos nuestra variable a nuestro view para pasarlo a la  vistax
        return view(
            'home',
            ['posts' => $posts]
        );
    }
}
