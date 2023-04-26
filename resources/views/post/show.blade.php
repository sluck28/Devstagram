@extends('layouts.app')
@section('titulo')
    {{ $post->title }}
@endsection

@section('contenido')
    <div class="container mx-auto flex">
        <div class="md:w-1/2">
            {{-- aqui pondremos nuestra imagen --}}
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="{{ $post->title }}">
            <div class="p-3">
                0 likes
            </div>

            <div class="font-bold">
                {{-- aqui traemos el nombre del usuario que hizo la publicacion con la relacion
                    del modelo en post --}}
                <p>{{$post->user->username}}</p>
                <p class="tex-sm text-gray-500">
                    {{-- para imprimir la fecha  con la libreria carbon  --}}
                    {{$post->created_at->diffForHumans()}}
                </p>
            </div>
        </div>
        <div class="md:w-1/2">
            2
        </div>

    </div>
@endsection
