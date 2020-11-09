@extends('layouts.dashboard')

@section('title', 'Dashboard - Courses')

@section('content')
    <div class="main-courses">
        @foreach($courses as $course)
        <div class="course-container">
            <div class="course-info">
                <img src="{{asset('/image/'.$course->image)}}" style="height: 100px; width: 100%;">
                <span>{{$course->name}}</span>
            </div>
            <div class="course-options">
                <a class="course-options--item" href="">Alunos inscritos</a>
                <a class="course-options--item" href="">Módulos do curso</a>
                <a class="course-options--item" href="">Editar curso</a>
            </div>
        </div>
        @endforeach        
    </div>
@endsection