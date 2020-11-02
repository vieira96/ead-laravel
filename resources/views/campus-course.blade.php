<!DOCTYPE html>
<html lang="en" style="height: 100%;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/style.css">
    <title></title>
</head>
<body class="bg-platform-900">
    <header style="width: 100vw" class="flex items-center h-20 shadow shadow-lg fixed">
        <div class="lg:container lg:mx-auto w-full">
            <nav class="flex items-center justify-between flex-wrap">
                <div class="flex items-center flex-shrink-0 text-white w-auto">
                    <a href="{{url('/')}}" class="font-serif text-3xl tracking-tight px-2">Logo</a>
                </div>
                
                <div class="flex justify-end flex-grow lg:flex lg:items-center lg:w-auto flex-1">
                    <div class="flex">
                        @if($user)
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
    
    <main style="top: 5rem;" class="flex fixed">
        <aside id="aside" class=" shadows shadow-2xl flex flex-col">   

            <ul>
                <li>
                    <div class="container-class w-full flex flex-col shadow shadow-lg">   
                        <span class="module flex justify-center items-center text-white shadow shadow-lg">Intermediario</span>
                        <div class="class w-full flex flex-col p-5 pt-2">
                            <a class="class-single w-full shadow shadow-lg flex justify-center items-center" href="">aula 1</a>
                            <a class="class-single w-full shadow shadow-lg flex justify-center items-center" href="">aula 2</a>
                            <a class="class-single w-full shadow shadow-lg flex justify-center items-center" href="">aula 3</a>
                        </div>
                    </div>
                </li>

                
            </ul>
        </aside>
        <div id="main" class="main">
            
        </div>
    </main>

    

    <script>
        var aside = document.getElementById("aside");
        var main = document.getElementById("main");
        window.onscroll = function() {scrolling()};

        function scrolling() {
            if (document.body.scrollTop > 78 || document.documentElement.scrollTop > 78) {
                aside.classList.add("my-fixed");
            } else {
                aside.classList.remove("my-fixed");
            }
        }

        var acc = document.getElementsByClassName("module");

        for (i = 0; i < acc.length; i++) {

            acc[i].addEventListener("click", function() {
                /* percorre os elementos que contem a classe accordion e quando achar o que 
                possuí a classe active, remove e interrompe o loop. */
                for(j = 0; j < acc.length; j++) {
                    if(acc[j].classList.contains('active-module')) {
                        acc[j].classList.remove('active-module');
                        break;
                    }
                }
                //adiciona a classe actie no item clicado.
                this.classList.add("active-module");

                //Pega os itens que tem a classe panel
                var panels = document.getElementsByClassName('class');
                
                /*percorre os itens que tem a classe panel para verificar se alguma está com a classe
                para exibir as aulas e quando encontrar, remove a classe */
                for(j = 0; j < panels.length; j++) {
                    if(panels[j].classList.contains('active-class')) {
                        panels[j].classList.remove('active-class');
                        break;
                    }         
                }

                //pega o proximo elemento após o item clicado e adiciona a classe para exibir o painel.
                var panel = this.nextElementSibling;
                panel.classList.add('active-class');

            });
        }

    </script>
</body>
</html>