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
    <header class="flex items-center h-20 shadow shadow-2xl">
        <div class="lg:container lg:mx-auto w-full">
            <nav class="flex items-center justify-between flex-wrap">
                <div class="flex items-center flex-shrink-0 text-white w-auto">
                    <a href="{{url('/')}}" class="font-serif text-3xl tracking-tight px-2">Logo</a>
                </div>
                
                <div class="flex justify-end flex-grow lg:flex lg:items-center lg:w-auto flex-1">
                    <div>
                        @if($user)
                            <a href="{{url('campus')}}" class="text-sm px-4 py-1 leading-none text-gray-400 mt-4 lg:mt-0 border rounded-2xl border-gray-200 bg-platform-800">Campus</a>
                            <a href="{{url('profile')}}" class="text-sm px-4 py-1 leading-none text-white mt-4 lg:mt-0 border rounded-2xl border-gray-200">Meu perfil</a>
                            <a href="{{url('logout')}}" class="text-sm px-2 py-2 leading-none text-white hover:text-gray-200 mt-4 lg:mt-0">Sair</a>
                        @else
                            <a href="{{url('login')}}" class="text-sm px-4 py-2 leading-none text-white mt-4 lg:mt-0 hover:text-gray-200">Entrar</a>
                            <a href="{{url('register')}}" class="text-sm px-2 py-2 leading-none text-white hover:text-gray-200 mt-4 lg:mt-0">Registrar-se</a>
                        @endif
                    </div>
                </div>
          </nav>
        </div>
    </header>

    <div>
        @yield('content')
    </div>

    <footer class="w-full shadow shadow-2xl h-16 flex items-center justify-center"> 
        footer     
    </footer>

</body>
</html>
