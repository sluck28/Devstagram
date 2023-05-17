<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\User;


class PerfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd('aqui se muestra el formulario');
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        # code...
        // dd('guardando cambios');
        $request->request->add(['username' => Str::slug($request->username)]);
        $this->validate($request, [
            'username' => 'required|unique:users|min:8|max:20|not_in:twitter',
        ]);

        if ($request->imagen) {
            // return 'desde imagenController';
            //para saber que imagen se esta subiendo
            //creamos la imagen
            $imagen = $request->file('imagen');
            //lo que hacemos le asignamos a la imagen un id unico
            $nombreImagen = Str::uuid() . "." . $imagen->extension();
            //guardamos la imagen en el servidor
            $imagenServidor = Image::make($imagen);

            //efecto de intervention image para la imagen
            $imagenServidor->fit(1000, 1000);

            //aqui se guardamos la imagen en la carpeta uploads
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;

            $imagenServidor->save($imagenPath);

        }
        //aqui encontramos al usuario que esta modificando su perfil
        $usuario=User::find(auth()->user()->id);
        $usuario->username=$request->username;
        $usuario->imagen=$nombreImagen ?? auth()->user()->imagen ?? null;
        $usuario->save();


        return redirect()->route('post.index',$usuario->username);



    }
}
