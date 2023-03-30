<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

            return response()->json(['imagen'=>'Probando respuesta']);

        }
    }
}
