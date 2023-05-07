@extends('layouts.app')
@section('titulo')
    {{ $post->title }}
@endsection

@section('contenido')
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            {{-- aqui pondremos nuestra imagen --}}
            <img src="{{ asset('uploads') . '/' . $post->image }}" alt="{{ $post->title }}">
            <div class="p-3">
                0 likes
            </div>

            <div class="font-bold">
                {{-- aqui traemos el nombre del usuario que hizo la publicacion con la relacion
                    del modelo en post --}}
                <p>{{ $post->user->username }}</p>
                <p class="tex-sm text-gray-500">
                    {{-- para imprimir la fecha  con la libreria carbon  --}}
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">
                    {{ $post->description }}
                </p>
            </div>
            {{-- el boton solo se mostrara para las personas que esten autenticadas con el id del usuario 
                asi que los invitados no pueden ver el boton --}}
            @auth
                @if ($post->user_id == auth()->user()->id)
                    <form  action="{{route('post.destroy',$post)}}">
                        {{-- utilizamos el metodo spuffin para eliminar algun post o dato --}}
                        @method('DELETE')
                        @csrf
                        <input class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4  cursor-pointer"
                            type="submit" value="eliminar publicacion">
                    </form>
                @endif
            @endauth
        </div>
        <div class="md:w-1/2 p-5">
            <div class="shadow bg-white p-5 mb-5">
                {{-- con auth podemos mostrar objetos a usuarios que si esten autenticados y los que no --}}
                @auth
                    <p class="text-xl font-bold text-center mb-4">
                        Agrega un comentario
                    </p>
                    @if (session('mensaje'))
                        <div class="bg-green-500 p-2 rounded-lg  mb-6 text-white uppercase font-bold">
                            {{ session('mensaje') }}
                        </div>
                    @endif
                    {{-- asi se pasa la ruta al action en el formulario --}}
                    <form action="{{ route('comentarios.store', ['post' => $post, 'user' => $user]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="mb-2 block uppercase text-gray-500 font-extrabold">
                                Comentario
                            </label>
                            <textarea id="comentario" type="text" name="comentario" class="border p-3 w-full rounded-lg"
                                placeholder="Agrega un comentario"> </textarea>

                            @error('comentario')
                                <!--php cuenta con una libreria de menesajes de errores pero son en ingles-->
                                <p class="bg-red-500 text-white rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>

                        <input type="submit" value="Comentar"
                            class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3  text-white rounded-full">
                    </form>

                @endauth
                <div class="bg-white shadow mb-5 max-h-96 overflow-y-auto mt-10">
                    @if ($post->comments->count())
                        @foreach ($post->comments as $comentario)
                            <div class="p-5 border-gray-300 border-b">
                                {{-- asi podemos acceder al perfil del usuario que nos comento --}}
                                <a class="font-bold" href="{{ route('post.index', $comentario->user) }}">
                                    {{-- aqui traemos el nombre del usuario que comento --}}
                                    {{ $comentario->user->username }}
                                </a>
                                {{-- traemos el comentario --}}
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-600">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No hay comentarios aun</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
