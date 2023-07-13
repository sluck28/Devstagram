<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
     {{-- manera de mostrar los posts de las personas que seguimos --}}
     @if ($posts->count())
     <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
         @foreach ($posts as $post)
             <div>
                 {{-- para redirigir a un post, por lo que utilizamos nuestra variable --}}
                 {{-- Pasmos en un arreglo el nombre del post y nombre del usaurio --}}
                 <a href="{{ route('post.show', ['post' => $post, 'user' => $post->user]) }}">
                     {{-- //manera de traer la imagen utilizando asset con la carpeta en donde se guarda la imagen --}}
                     <img src="{{ asset('uploads') . '/' . $post->image }}"
                         alt="Imagen del post {{ $post->title }}">
                 </a>
             </div>
         @endforeach
     </div>
     {{-- aqui mandamos a llamar la paginacion con el nombre de la variable post --}}
     <div class="my-10">
         {{ $posts->links('pagination::tailwind') }}
     </div> 
     @else
         <p class="text-center">No hay posts sigue a alguien para ver sus posts.</p>
     @endif
</div>