<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
//importamos esta clase para guardar la imagen en el servidor
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    

    public function store(Request $request)
    {
        
        if($request->hasFile('Foto')){
            //dd('subiendo una foto');
            /**$empleado=Empleado::findOrFail($id);
            /**Primero se borra la foto */
            //Storage::delete('public/'.$empleado->Foto);
            /**DEspues se guarda la nueva  */
            //$datosEmpleado['Foto']=$request->file('Foto')->store('images','public');


            $imagen=$request->file('file');
            //crea un id unico para nuestra imagen
            $nombreImagen = Str::uuid(). "." .$imagen->extension();
            //aqui se va a almacenar nuestra imagen con intervention
            $imagenServidor= Image::make($imagen);
            //le da a la imagen un ancho y un largo
            $imagenServidor->fit(1000,1000);
            //aqui estamos guardando la imagen en la carpeta de uploads
            $imagenpPath= public_path('uploads'). '/'   .   $nombreImagen;
            //aqui ya la guardamosP
            $imagenServidor->save($imagenpPath);

            return response()->json(['imagen'=>$nombreImagen]);

        }
    }
}
