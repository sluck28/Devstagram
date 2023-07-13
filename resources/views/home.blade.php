@extends('layouts.app')


@section('titulo')
    Devstagram
@endsection

@section('contenido')
{{-- podemos usar algun componente para no reutilizar codigo --}}
   <x-listar-post :posts="$posts" />
@endsection
