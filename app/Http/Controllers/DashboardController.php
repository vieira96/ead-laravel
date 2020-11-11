<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CourseRequest;

use App\Models\Course;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrator');
    }

    public function index()
    {
        return view('dashboard.home');
    }

    public function courses()
    {
        $courses = Course::all();
    
        return view('dashboard.courses', [
            'courses' => $courses
        ]);
    }

    public function newCourse()
    {        
        return view('dashboard.new-course');
    }

    public function newCourseAction(CourseRequest $request)
    {
        //validator
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()) {
            return redirect('dashboard/new')
            ->withErrors($validator)
            ->withInput();
        }
        //final do validator


        //Lidando com a imagem do curso
        $file = $request->file('image');
        

        //lidando com a imagem
        //redimensiona a imagem
        $img = Image::make($file->path())->resize(500, null, function($constraint){
            $constraint->aspectRatio();
        });

        $mime = explode('/', $img->mime());
        $mime = '.'.$mime[1];
        
        $file_name = rand(0, 99999).time().rand(0,99999).$mime;

        // $file_name = rand(0, 9999)
        $img->save('../public/image/courses/'.$file_name, 80);
        // imagem salva com um nome aleatorio na pasta

        //tiro os espaços e coloco um " - " no lugar
        $slug = explode(' ', $request->input('slug'));
        $slug = implode('-', $slug);

        $new_course = new Course();
        $new_course->image = $file_name;
        $new_course->slug = $slug;
        $new_course->name = $request->input('name');
        $new_course->description = $request->input('description');
        $new_course->save();

        return redirect('/course/'.$new_course->slug);
    }

    public function editCourse($id)
    {
        $course = Course::find($id);

        return view('dashboard.edit', [
            'course' => $course
        ]);
    }
}
