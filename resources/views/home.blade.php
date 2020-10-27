@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div style="height: 32rem" class="w-full flex justify-center items-center">
        <div style="width: 50%" class="w-44">
            <div class="lg:flex">
                <div class="lg:flex-shrink-0">
                    <img class="rounded-md rounded-full lg:w-63" src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=448&q=80" width="448" height="299" alt="Woman paying for a purchase">
                </div>
                <div class="mt-4 md:mt-0 md:ml-6">
                    <div class="uppercase tracking-wide text-sm text-white font-bold text-3xl">Professor</div>
                    <p class="block mt-1 text-lg leading-tight font-light text-gray-300 text-2xl">Nome professor</p>
                    <p class="mt-2 text-gray-200 font-light">Getting a new business off the ground is a lot of hard work. Here are five ideas you can use to find your first customers aaaaaaaaaaaaaaa bbbbbbbbb ccccccccc ddddddd eeeeeeeeee ffffffffff ggggggggg hhhhhh.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:container lg:mx-auto">
        <h1 class=" text-2xl text-white font-light mt-6">Todos os nossos cursos</h1>
        <div class="flex flex-wrap justify-items-stretch">

            @foreach($course_list as $course)
                <div class="w-1/3 p-2">
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
