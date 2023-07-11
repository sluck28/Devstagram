@extends('layouts.app')


@section('titulo')
 Devstagram
@endsection

@section('contenido')
    @if ($posts->count())
        <p>Hay posts</p>
    @else
        <p>No hay posts</p>
    @endif
@endsection
