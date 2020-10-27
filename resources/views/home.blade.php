@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div class="w-full h-64 bg-platform-700">

    </div>

    <div class="w-full min-h-screen lg:container lg:mx-auto">
        <h1 class=" text-2xl text-white font-light mt-6">Todos os nossos cursos</h1>
        <div class="flex flex-wrap justify-items-stretch">

            @foreach($course_list as $course)
                <div class="w-1/4 p-2">
                    <div class="min-h-full max-w-sm rounded overflow-hidden shadow-lg flex items-center flex-col">
                        <img style="height: 200px;" class="w-full" src="{{asset('image/'.$course->image)}}">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl text-gray-400 mb-2 text-3xl">{{$course->name}}</div>
                        </div>
                        <div style="width: 80%" class="px-6 pt-4 pb-2 flex flex-col">
                            <a href="{{url('/curso/'.$course->slug)}}"><span class="rounded-full px-3 py-1 text-sm font-semibold text-gray-300 mr-2 mb-2 border border-gray-500 w-full flex justify-center">Ir para o curso</span></a>
                            <span class="rounded-full px-3 py-1 text-sm font-semibold text-gray-300 mr-2 mb-2 border border-gray-500 w-full flex justify-center">100%</span>
                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>
@endsection
