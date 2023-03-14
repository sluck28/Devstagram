<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

//existen diferentes tipos de request de tipo post/gest/put/destroy/patch
/**
 * GET recupere informacion
 * put actualiza informacion
 * post envia informacion
 * DESTROY elimina la informacion
 * PATCH para actualizar parcialmente un elemento
 */

class RegistrerController extends Controller
{
    //nuestro controlador para mostrar las vistas
    public function index() {
        return view('auth.register');
    }
   
    public function store(Request $request){

        //manera de acceder a todos los valores del envio de nuestros formularios
      //  dd($request->get('username'));
        //como realizar validaciones en el formulario
        //VALIDACION
         //usamos validate 

         //Modificamos el request para que no se dupliquen usernames
         $request->request->add(['username'=>Str::slug($request->username)]);
        $this->validate($request,[
             //aqui mandamos a llamar nuestro name del input que, queremos validar   
                'name'=>'required|max:30',//podemos poner una cantidad de caracteres requeridos y que solo agregue letras
                'username'=>'required|unique:users|min:8|max:20',
                'email'=>'required|unique:users|email|max:60',
                'password'=>'required|min:6|confirmed'
        ]);

        
        //Aqui agregamos 
        //ESTE ES NUESTRO INSERT INTO para ingresar datos
        User::create( 
            [
                'name'=>$request->name,
            /** Helper que nos ayuda a pasar el texto en miniscula y convertir texto en url para que no de problemas*/ 
                'username'=>$request->username,
                'email'=>$request->email,
               /**
                * Asi hasheamos nuestras contraseñas  con hash::make*/ 
                'password'=>Hash ::make($request->password)
            ]
        );

        //Autenticar un usuario
       /*  auth()->attempt(
            [
                'email'=>$request->email,
                'password'=>$request->password
            ]
        );*/
        /**
         * Otra forma de autenticar con solo algunos campos
         */

         auth()->attempt($request->only(
            'email','password'
         ));
        //manera de redireccionar a una ruta una vez que se alla registrado
        return redirect()->route('post.index');

    }
}


