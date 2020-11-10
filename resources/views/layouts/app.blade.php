<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title')</title>
</head>
<body class="bg-platform-900">
    <header class="flex items-center h-20 shadow shadow-lg">
        <div class="lg:container lg:mx-auto w-full">
            <nav class="flex items-center justify-between flex-wrap">
                <div class="flex items-center flex-shrink-0 text-white w-auto">
                    <a href="{{url('/')}}" class="font-serif text-3xl tracking-tight px-2">Logo</a>
                </div>
                
                <div class="flex justify-end flex-grow lg:flex lg:items-center lg:w-auto flex-1">
                    <div class="flex">
                        @if($user)
                            @if($user->office > 0)
                                <a href="{{url('dashboard')}}" class="text-sm px-4 py-1 leading-none text-gray-400 mt-4 lg:mt-0 border rounded-2xl border-gray-200 bg-platform-800 mr-3 flex justify-center items-center">Dashboard</a>
                            @endif
                            <a href="{{url('campus')}}" class="text-sm px-4 py-1 leading-none text-gray-400 mt-4 lg:mt-0 border rounded-2xl border-gray-200 bg-platform-800 mr-3 flex justify-center items-center">Campus</a>
                            <a href="{{url('profile')}}" class="text-sm px-4 py-1 leading-none text-white mt-4 lg:mt-0 border rounded-2xl border-gray-200 flex justify-center items-center">Meu perfil</a>
                            <a href="{{url('logout')}}" class="text-sm px-2 py-2 leading-none text-white hover:text-gray-200 mt-4 lg:mt-0">Sair</a>
                        @else
                            <div class="flex flex-col">
                                <span class="text-sm px-4 py-2 leading-none text-white mt-4 lg:mt-0 hover:text-gray-200 cursor-pointer block" id="login">
                                    Entrar
                                </span>
                                <div id="ballon" class="ballon hide">
                                    <form action="{{url('login')}}" method="POST">
                                        @csrf
                                        <input style="width: 140px" type="email" name="email" placeholder="Email">
                                        <input type="password" name="password" placeholder="Senha">
                                        <input type="submit" value=">" placeholder="Senha">
                                    </form>
                                </div>
                            </div>
                            <a href="{{url('register')}}" class="text-sm px-2 py-2 leading-none text-white hover:text-gray-200 mt-4 lg:mt-0">
                                Registrar-se
                            </a>
                        @endif
                    </div>
                </div>
          </nav>
        </div>
    </header>

    <main style="min-height: calc(100vh - 9rem)">
        @yield('content')
    </main>

    <footer class="w-full shadow shadow-2xl h-16 flex items-center justify-center"> 
        footer     
    </footer>
    
    <script>
        var login = document.getElementById("login");
        login.addEventListener('click', function(){
            var ballon = document.getElementById("ballon");
            if(ballon.classList.contains('hide')) {
                ballon.classList.remove('hide');
                ballon.classList.add('show');
            } else {
                ballon.classList.remove('show');
                ballon.classList.add('hide');
            }
        });
    </script>
</body>
</html>
