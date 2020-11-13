@extends('layouts.dashboard')

@section('title', 'modules')

@section('content')
    <div class="main-modules">
        <div class="modules-container">

            <div class="module-single">
                <div style="width: 40px; background-color: #ff00ff; height: 100%; margin-right: 10px;">

                </div>
                <div class="modules-options">
                    <a href="">Exibir aulas</a>
                    <a href="">Editar modulo</a>
                    <a href="">Excluir modulo</a>
                </div>
            </div>

            <div class="module-single">
                <div style="width: 40px; background-color: #ff00ff; height: 100%; margin-right: 10px;">

                </div>
                <div class="modules-options">
                    <a href="">Exibir aulas</a>
                    <a href="">Editar modulo</a>
                    <a href="">Excluir modulo</a>
                </div>
            </div>
            
            <div class="options">
                <div class="save-module">
                    <a href="">Salvar alterações</a>
                </div>

                <div class="new-module">
                    <a href="">Adicionar novo módulo</a>
                </div>
            </div>
            
        </div>
    </div>
@endsection