<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Desvtagram - @yield('titulo')</title>
        @vite('resources/css/app.css')
      
    </head>
    <body class="bg-gray-100">
        <header class="p-5 border-b bg-white shadow">
           <div class="container mx-auto flex justify-between ">
             
             <h1 class="text-3xl font-extrabold">
                 Desvtagram
             </h1>
             <!--Para saber si esta autenticado-->
                @auth
                <nav class="flex gap-2 items-center">
                    <a class="font-bold uppercase text-gray-600 text-sm" href="#">Hola <span class="font-normal">{{auth()->user()->username}}</span> </a>
                    <!--para agregar mas seguridad a nuestra pagina lo ponemos en un form el boton de cerrar sesion-->
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                    <button type="submit" class="font-bold uppercase text-gray-600 text-sm" href="{{route('logout')}}">Cerrar sesion</button>
                    </form>
                    
    
                 </nav>
                @endauth
                <!--PAra usuarios que no estan autenticados-->
                @guest
                    
             <nav class="flex gap-2 items-center">
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('login')}}">Login</a>
                <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('register')}}">Crear cuenta</a>

             </nav>
                @endguest

           </div>

        </header>
        <!--aqui ira todo nuestro contenido principal-->
        <main class="container mx-auto mt-10">
            <h2 class="font-black text-center text-3xl mb-10">
               <!--utilizamos yield para mandar ese contenido a otra pagina-->
                 @yield('titulo')
            </h2>
            @yield('contenido')
        </main>


        <footer class="mt-10 text-center p-5  text-gray-500 font-bold uppercase">
                                                        <!--Helpers en laravel para mostrar el año-->
            Desvtagram Todos los derechos reservados {{now()->year}}

        </footer>

  
        
    </body>
</hmtl>