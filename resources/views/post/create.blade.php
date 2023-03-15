@extends('layouts.app')

@section('titulo')
    Crea una nueva publicación
@endsection

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <!--nuestro dropzone para las imagenes-->
           <form action="/imagenes" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col
           
           justify-center items-center">
        
        </form>

        </div>

        <div class="md:w-1/2 px-10 drop-shadow-lg">
            <form action="{{route('register')}}" method="POST" novalidate >
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-extrabold">
                       Titulo
                    </label>
                    <input 
                        id="titulo"
                        type="text"
                       name="titulo" 
                       placeholder="Descripcion del titulo"
                       class="border p-3 w-full rounded-lg"
                       value="{{old('titulo')}}"
                    >

                    @error('titulo')
                    <!--php cuenta con una libreria de menesajes de errores pero son en ingles-->
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-500 font-extrabold">
                       Descripcion
                    </label>
                    <textarea 
                        id="descripcion"
                        type="text"
                       name="descripcion" 
                       placeholder="Descripción de la publicacion"
                       class="border p-3 w-full rounded-lg"
                      
                    >
                    </textarea>

                    @error('descripcion')
                    <!--php cuenta con una libreria de menesajes de errores pero son en ingles-->
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        
                    @enderror
                </div>
                 <input type="submit" value="Crear publicacion" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3  text-white rounded-full">

            </form>
            
        </div>
    </div>
@endsection