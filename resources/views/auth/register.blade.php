@extends('layouts.app')

@section('titulo')
    Registrate en Desvtagram
    
@endsection
@section('contenido')
    <div class="md:flex md:justify-center md:gap-4 md:items-center ">
        <div class="md:w-4/12 md:justify-center p-5 rounded-lg ">
            <!--como cargar una imagen utilizamos assets -->
            <img src="{{asset('images/registrar.jpg')}}" alt="Registrate">
                
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow" >
            <!--asi se manda a llamar nuestra action-->
            <form action="{{route('register')}}" method="POST" novalidate >
                @csrf
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-extrabold">
                        Nombre
                    </label>
                    <input 
                        id="name"
                        type="text"
                       name="name" 
                       placeholder="ingresa tu nombre"
                       class="border p-3 w-full rounded-lg"
                       value="{{old('name')}}"
                    >

                    @error('name')
                    <!--php cuenta con una libreria de menesajes de errores pero son en ingles-->
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-extrabold">
                        Username
                    </label>
                    <input 
                        id="username"
                        type="text"
                       name="username" 
                    
                       placeholder="ingresa tu userName"
                       class="border p-3 w-full rounded-lg"
                        value="{{old('username')}}"
                    >
                    
                    @error('username')
                    <!--php cuenta con una libreria de menesajes de errores pero son en ingles-->
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        
                    @enderror
                </div>
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-extrabold">
                        email
                    </label>
                    <input 
                        id="email"
                        type="email"
                       name="email" 
                       
                       placeholder="ingresa tu correo de registro"
                       class="border p-3 w-full rounded-lg"
                      value="{{old('email')}}"
                    >
                    <!--usamos old para que no se pierda el valor introducido--> 
                    @error('email')
                    <!--php cuenta con una libreria de menesajes de errores pero son en ingles-->
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-extrabold">
                        Password
                    </label>
                    <input 
                        id="password"
                        type="password"
                       name="password"  
                       placeholder="ingresa tu password de registro"
                       class="border p-3 w-full rounded-lg"
                        
                    >
                     
                    @error('password')
                    <!--php cuenta con una libreria de menesajes de errores pero son en ingles-->
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-extrabold">
                        Repite password
                    </label>
                    <input 
                        id="password_confirmation"
                        type="password"
                       name="password_confirmation"  
                       placeholder="ingresa tu password de registro"
                       class="border p-3 w-full rounded-lg"
                       
                    >
                     
                    @error('password_')
                    <!--php cuenta con una libreria de menesajes de errores pero son en ingles-->
                        <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{$message}}</p>
                        
                    @enderror
                </div>
                    <input type="submit" value="Crear cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3  text-white rounded-full">

            </form>

        </div>
    </div>
@endsection