@extends('layouts.app')

@section('title', $course->name)

@section('content')
    
<div class="lg:container lg:mx-auto mt-10 mb-10">
	<div class="lg:flex">
		<div class="lg:flex-shrink-0 flex justify-center items-center">
			<img style="width: 300px; height: 300px;" class="rounded-lg transition duration-500 transform hover:-translate-y-1 hover:scale-110" src="{{asset('image/'.$course->image)}}" width="448" height="299">
		</div>

		<div class="mt-4 md:mt-0 md:ml-6 flex justify-center items-center flex-col flex-1">
			<div class="uppercase tracking-wide text-sm text-gray-400 font-bold">Categoria: Programação</div>
			<p class="block mt-1 text-lg leading-tight font-light text-gray-300">Nome do curso: {{$course->name}}</p>
			<p class="mt-2 text-gray-200 font-light break-words">Descrição: {{$course->description}}</p>
			@if($is_student)
				<a class="transition duration-300 transform hover:-translate-y-1 hover:scale-110 text-white border p-2 rounded-3xl border-gray-300 mt-3 bg-gray-600" href="{{url('campus/'.$course->slug)}}">Ir para o curso</a>
			@else
				<a class="transition duration-300 transform hover:-translate-y-1 hover:scale-110 text-white border p-2 rounded-3xl border-gray-300 mt-3 bg-gray-600" href="{{url($course->slug.'/signup')}}">Inscrever-se</a>
			@endif
			<div class="flex justify-center w-full mt-3 rating-area">
				<div class="rating-area-int">
					<span class="text-white font-light">3,6</span>
					<div class="estrelas">
						<label class="star" for="cm_star-1"><i class="fa"></i></label>
						<input type="radio" id="cm_star-1" name="fb" value="1"/>
						<label class="star" for="cm_star-2"><i class="fa"></i></label>
						<input type="radio" id="cm_star-2" name="fb" value="2" checked/>
						<label class="star" for="cm_star-3"><i class="fa"></i></label>
						<input type="radio" id="cm_star-3" name="fb" value="3"/>
						<label class="star" for="cm_star-4"><i class="fa"></i></label>
						<input type="radio" id="cm_star-4" name="fb" value="4"/>
						<label class="star" for="cm_star-5"><i class="fa"></i></label>
						<input type="radio" id="cm_star-5" name="fb" value="5"/>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

@endsection