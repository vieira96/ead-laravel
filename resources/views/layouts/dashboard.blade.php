<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/dashboard.css">

    <title>@yield('title')</title>
</head>
<body>
    <section class="full-screen">
        <aside class="aside">
            <div class="aside-header">
                <div class="logo">
                  <a href="{{url('/')}}">logo</a>
                </div>

                <div class="user-info">
                    <div class="avatar">

                    </div>
                    <span>Nome</span>
                    <span>Cargo</span>
                </div>

                <div class="aside-menu">
                    <nav>
                        <ul>
                            <li><a href="{{url('/dashboard')}}">Home</a></li>
                            <li><a href="{{url('/dashboard/courses')}}">Cursos</a></li>
                            <li><a href="">Usuarios</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </aside>

        <main class="main">
            <div class="fa-bars">
                <img src="{{asset('/image/menu.svg')}}" alt="">
            </div>

            @yield('content')

        </main>
        
    </section>
    <script src="{{asset('/js/dashboard.js')}}"></script>
</body>
</html>