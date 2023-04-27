@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:flex-row">
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('images/usuario.svg') }}" alt="imagen de persfil">
            </div>
            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <!--Asi se imprime nombre del usuario-->
                <p class="text-gray-700  text-2xl">{{$user->username }}</p>
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

    <section class="container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        {{-- //para imprimr un arreglo utilizamos un  --}}
        @if ($post->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($post as $posts)
                    <div>
                        {{-- para redirigir a un post, por lo que utilizamos nuestra variable --}}
                        {{-- Pasmos en un arreglo el nombre del post y nombre del usaurio --}}
                        <a href="{{route('post.show',['post'=>$posts, 'user'=>$user])}}">
                            {{-- //manera de traer la imagen utilizando asset con la carpeta en donde se guarda la imagen --}}
                            <img src="{{ asset('uploads') . '/' . $posts->image }}"
                                alt="Imagen del post {{ $posts->title }}">
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- aqui mandamos a llamar la paginacion con el nombre de la variable post --}}
            <div class="my-10">
                {{ $post->links('pagination::tailwind') }}
            </div>
            
            

    @else
        <p class="text-gray-600 uppercase text-sm text-center font-bold">No hay publicaciones</p>
        @endif
    </section>
@endsection
