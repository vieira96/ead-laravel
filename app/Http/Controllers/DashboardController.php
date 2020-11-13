<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        $user = Auth::user();

        return view('dashboard.home',[
            'user' => $user
        ]);
    }

    public function courses()
    {
        $user = Auth::user();
        $courses = Course::all();
    
        return view('dashboard.courses', [
            'courses' => $courses,
            'user' => $user
        ]);
    }

    public function newCourse()
    {
        $user = Auth::user();

        return view('dashboard.new-course', [
            'user' => $user
        ]);
    }

    public function newCourseAction(CourseRequest $request)
    {
        $user = Auth::user();
        //validator
        
        $request->validated();
        

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
        $new_course->owner_id = $user->id;
        $new_course->save();

        return redirect('/course/'.$new_course->slug);
    }

    public function editCourse($id)
    {
        $user = Auth::user();
        $course = Course::find($id);

        return view('dashboard.edit-course', [
            'course' => $course,
            'user' => $user
        ]);
    }

    public function editCourseAction($id, CourseRequest $request)
    {
        $course = Course::find($id);
        $file_name = $course->image;

        //validator
        $validator = $request->validated();
    
        //final do validator

        //Lidando com a imagem do curso
        $file = $request->file('image');
        
        if($file){
            //deletar a imagem antiga do curso
            if(file_exists('../public/image/courses/'.$file_name)) {
                unlink('../public/image/courses/'.$file_name);
            }

            //lidando com a imagem
            //redimensiona a imagem
            $img = Image::make($file->path())->resize(500, null, function($constraint){
                $constraint->aspectRatio();
            });

            $mime = explode('/', $img->mime());
            $mime = '.'.$mime[1];
            
            $file_name = rand(0, 99999).time().rand(0,99999).$mime;
            $img->save('../public/image/courses/'.$file_name, 80);
            // imagem salva com um nome aleatorio na pasta
        }
        //tiro os espaços e coloco um " - " no lugar
        $slug = explode(' ', $request->input('slug'));
        $slug = implode('-', $slug);
        
        $course->image = $file_name;
        $course->slug = $slug;
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->save();
        return redirect('dashboard/course/edit/'.$id);
    }

    public function deleteCourse($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect('/dashboard/courses');
    }

    public function modules($id)
    {
        $user = Auth::user();
        return view('dashboard.course-modules',[
            'user' => $user
        ]);
    }
}
