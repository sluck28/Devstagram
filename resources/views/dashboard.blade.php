@extends('layouts.app')

@section('titulo')
    Tu cuenta    
@endsection

@section('contenido')
        <div class="flex justify-center">
            <div class="w-full md:w-8/12 lg:w-6/12 px-5 md:flex">
                <div class="md:w-8/12 lg:w-6/12 px-5">
                    <img src="{{asset('images/usuario.svg')}}" alt="imagen de persfil">
                </div>
                    <div class="md:w-8/12 lg:w-6/12 px-5">
                        <!--Asi se imprime nombre del usuario-->
                        <p class="text-gray-700  text-2xl">{{auth()->user()->username}}</p>
                    </div>

            </div>
        </div>
@endsection