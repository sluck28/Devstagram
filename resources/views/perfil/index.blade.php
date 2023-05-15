@extends('layouts.app')

@section('titulo')
    Editar Perfil {{ auth()->user()->username }}
@endsection

@section('contenido')
    {{-- formulario pra cambiar perfil del usuario --}}
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadows p-6">
            <form method="POST" class="mt-10 md:mt-0" action="{{route('perfil.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-extrabold">
                        Username
                    </label>
                    <input id="username" type="text" name="name" placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg" value="{{ auth()->user()->username }}">

                    @error('username')
                        <!--php cuenta con una libreria de menesajes de errores pero son en ingles-->
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-extrabold">
                        Imagen de perfil
                    </label>
                    <input id="imagen" type="file" name="imagen" class="border p-3 w-full rounded-lg"
                        accept=".jpg, .jpeg, .png">
                </div>
                <input type="submit" value="Guardar cambios" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3  text-white rounded-full">
            </form>
        </div>

    </div>
@endsection
