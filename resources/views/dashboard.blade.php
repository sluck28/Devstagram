@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection

@section('contenido')
        <div class="flex justify-center">
            <div class="w-full md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:flex-row">
                <div class="md:w-8/12 lg:w-6/12 px-5">
                    <img src="{{asset('images/usuario.svg')}}" alt="imagen de persfil">
                </div>
                    <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                        <!--Asi se imprime nombre del usuario-->
                        <p class="text-gray-700  text-2xl">{{auth()->user()->username}}</p>
                        <p class="text-gray-800 text-sm mb-3 font-bold mt-5">
                                0
                            <span class="font-normal">
                                Seguidores
                            </span>
                        </p>

                        <p class="text-gray-800 text-sm mb-3 font-bold">
                            0
                        <span class="font-normal">
                            Siguiendo
                        </span>
                    </p>
                    <p class="text-gray-800 text-sm mb-3 font-bold">
                        0
                    <span class="font-normal">
                        Post
                    </span>
                    </div>



            </div>
        </div>
@endsection