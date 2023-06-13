@extends('layouts.app')

@section('titulo')
    Perfil: {{ $user->username }}
@endsection

@section('contenido')
    <div class="flex justify-center">
        <div class="w-full md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:flex-row">
            @if ($user->imagen)
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('perfiles'). '/' . $user->imagen }}" alt="imagen de persfil">
            </div>
            @else
            <div class="md:w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('images/usuario.svg') }}" alt="imagen de persfil">
            </div>
            @endif

            <div class="md:w-8/12 lg:w-6/12 px-5 flex flex-col items-center md:justify-center md:items-start py-10">
                <div class="flex items-center gap-4">
                    <!--Asi se imprime nombre del usuario-->
                    <p class="text-gray-700  text-2xl">{{ $user->username }}</p>
                    @auth
                        @if ($user->id == auth()->user()->id)
<<<<<<< HEAD
                            <a href="{{ route('perfil.index', $user) }}" class="text-gray-500  hover:text-gray-600">
=======
                            <a

                            href="{{route('perfil.index')}}" class="text-gray-500  hover:text-gray-600">
>>>>>>> 4524e6b49bfc9120cbedd2f7220f691ed4135373
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                </svg>

                            </a>
                        @endif
                    @endauth
                </div>
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
                    {{ $user->posts->count() }}
                    <span class="font-normal">
                        Post
                    </span>

                </p>
                @auth
                    <form action="{{ route('user.follow', $user) }}" method="POST">
                        @csrf
                        <input type="submit"
                            class="bg-blue-600 text-white uppercase rounded-lg  px-3  py-1
                    text-xs font-bold cursor-pointed"
                            value="SEGUIR">
                    </form>

                    <form action="" method="POST">
                        @csrf
                        <input type="submit"
                            class="bg-red-600 text-white uppercase rounded-lg  px-3  py-1
                       text-xs font-bold cursor-pointed"
                            value="Dejar de seguir">
                    </form>
                @endauth
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
                        <a href="{{ route('post.show', ['post' => $posts, 'user' => $user]) }}">
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
