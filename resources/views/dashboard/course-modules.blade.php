@extends('layouts.dashboard')

@section('title', 'modules')

@section('content')
    <div class="main-modules">
        
        <div class="modules-container">
            @if($errors->any())
                @foreach ($errors->get('name') as $error)
                    <div class="alert error">
                        {{$error}}
                    </div>
                @endforeach
            @endif
            @foreach($modules as $module)
                <div class="module-single">
                    <div class="module-name">
                        <span>{{$module->name}}</span>
                    </div>
                    <div class="module-options">
                        <a href="">Exibir aulas</a>
                        <a href="">Editar modulo</a>
                        <a href="">Excluir modulo</a>
                    </div>
                </div>
            @endforeach
           
            <div class="new-module-container">
                <a class="btn" onclick="openForm()">Adicionar novo módulo</a>
            </div>

            <div class="new-module">
                <form method="POST" action="{{url('dashboard/course/'.$course->id.'/new')}}">
                    @csrf
                    <div class="input-group">
                        <label for="name">Nome do módulo</label>
                        <input type="text" name="name" required>
                    </div>
                    
                    <div class="send-cancel">
                        <input type="submit" class="btn" value="Criar">
                        <a class="btn light" onclick="closeForm()">Cancelar</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection