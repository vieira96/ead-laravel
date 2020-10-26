
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>@yield('title')</title>
</head>
<body class="min-h-screen bg-platform-900">
    <header class="flex items-center h-20">
        <div class="lg:container lg:mx-auto">
            <nav class="flex items-center justify-between flex-wrap">
                <div class="flex items-center flex-shrink-0 text-white">
                    <a href="{{url('/')}}" class="font-serif text-3xl tracking-tight">Logo</a>
                </div>
                
                <div class="flex justify-end flex-grow lg:flex lg:items-center lg:w-auto">
                    <div>
                        <a href="{{url('profile')}}" class="text-sm px-4 py-2 leading-none text-white mt-4 lg:mt-0 border rounded-2xl border-gray-200">Minha Conta</a>
                        <a href="{{url('logout')}}" class="text-sm px-4 py-2 leading-none text-white hover:text-gray-200 mt-4 lg:mt-0">Sair</a>
                    </div>
                </div>
          </nav>
        </div>
    </header>

    <div>
        @yield('content')
    </div>

    <footer class="h-64 w-full shadow shadow-2xl mt-10"> 
        <div class="lg:container lg:mx-auto h-full flex">
            <div class="flex-1 p-1 flex justify-center">
                <div>
                    <h2 class=" text-3xl text-gray-400 font-serif">Todos os cursos da plataforma</h2>
                    <ul class="p-1">
                        
                        @foreach ($all_courses as $key => $course)
                            @if($key != 7)
                                <li><a class="text-gray-300 hover:text-gray-400" href="{{url('/curso/'.$course->slug)}}">{{$course->name}}</a></li>
                            @endif
                            @if($key === 7)
                                <li><a class="text-gray-400 hover:text-gray-500" href="{{url('/cursos')}}">Ver todos</a></li>
                                @break
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex-1 p-1 flex justify-center">
                <div>
                    <h2 class=" text-3xl text-gray-400 font-serif">Contato</h2>
                    <ul class="p-1">
                        <li class="text-gray-300">E-mail:<a href="#"> samuelvieiradasilva96@hotmail.com</a></li>
                        <li class="text-gray-300"><a href="#">Contato pela plataforma</a></li>
                        <li class="text-gray-300">Telefone: (22) 992747637</li>
                    </ul>
                </div>
            </div>
        </div>        
    </footer>

</body>
</html>

{{-- <html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html> --}}