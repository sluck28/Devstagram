<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    

    public function store(Request $request)
    {
        // return 'desde imagenController';
        //para saber que imagen se esta subiendo 
        //creamos la imagen
        $imagen=$request->file('file');
        //lo que hacemos le asignamos a la imagen un id unico
        $nombreImagen=Str::uuid(). "." . $imagen->extension();
        //guardamos la imagen en el servidor
        $imagenServidor=Image::make($imagen);

        //efecto de intervention image para la imagen
        $imagenServidor->fit(1000,1000);

        //aqui se guardamos la imagen en la carpeta uploads
        $imagenPath=public_path('uploads'). '/'.$nombreImagen;

        $imagenServidor->save($imagenPath);


        //return el nombreImagen para el id unico
        return response()->json(['imagen'=>$nombreImagen]);


    }
}
