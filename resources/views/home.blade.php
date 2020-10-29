@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <div style="height: 32rem" class="w-full flex justify-center items-center">
        <div>
            <div class="lg:flex">
                <div class="lg:flex-shrink-0 flex justify-center">
                    <img style="width: 400px" class="rounded-md rounded-full" src="https://images.unsplash.com/photo-1556740738-b6a63e27c4df?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=448&q=80" width="448" height="299" alt="Woman paying for a purchase">
                </div>
                <div class="mt-4 md:mt-0 md:ml-6 flex flex-col items-center">
                    <div class="tracking-wide text-sm text-white text-3xl">Professor</div>
                    <p class="block mt-1 text-lg leading-tight font-light text-gray-300 text-2xl">Nome professor</p>
                    <p class="pl-3 mt-2 text-gray-200 font-light">Getting a new business off the ground is a lot of hard work. Here are five ideas you can use to find your first customers aaaaaaaaaaaaaaa bbbbbbbbb ccccccccc ddddddd eeeeeeeeee ffffffffff ggggggggg hhhhhh.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:container lg:mx-auto">
        <h1 class=" text-2xl text-white font-light mt-6">Todos os nossos cursos</h1>
        <div class="flex flex-wrap justify-items-stretch mb-10">

            @foreach($course_list as $course)
                <div class="mt-5 w-course p-2 flex flex-col">
                    <div class="min-h-full max-w-sm rounded overflow-hidden shadow-lg flex items-center flex-col">
                        <img style="height: 200px;" class="w-full" src="{{asset('image/'.$course->image)}}">
                        <p class="px-6 py-4font-bold text-xl text-gray-400 mb-2 text-3xl">{{$course->name}}</p>
                        <p class="px-6 pt-4 pb-2 break-words">{{$course->description}}aaaaaa aaaaaaaaaaaaaaa aaaaaaaaaaaaaa aaaaa</p>
                    </div>

                    <div class="bg-green-300 max-w-sm w-full">
                        <a class="flex justify-center items-center w-full text-green-600" href="{{url($course->slug)}}">Ver Curso</a>
                    </div>
                    
                </div>

            @endforeach

        </div>
    </div>
@endsection
