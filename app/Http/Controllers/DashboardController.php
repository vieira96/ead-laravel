<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;

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
        $course = Course::create($request->validated());
        //toda a logica está no CourseObserver creating()
        return redirect('/dashboard/courses');
    }

    public function editCourse($id)
    {
        $user = Auth::user();
        $course = Course::find($id);
        if($course) {
            if(Gate::allows('edit-course', $course)){
                return view('dashboard.edit-course', [
                    'course' => $course,
                    'user' => $user
                ]);
            }
        }
        return redirect('/dashboard/courses');
    }

    public function editCourseAction($id, CourseRequest $request)
    {   
        $course = Course::find($id);
        $file_name = $course->image;

        $course->update($request->validated());
        if($file_name != $course->image) {
            if(file_exists('../public/image/courses/'.$file_name)) {
                unlink('../public/image/courses/'.$file_name);
            }
        }
        return redirect('/dashboard/course/'.$id.'/edit');
    }

    public function deleteCourse($id)
    {
        $course = Course::find($id);
        if($course){
            if(Gate::allows('delete-course', $course)){
                //deleta a imagem do curso antes de deletar o curso
                //TODO: deletar todos os modulos do curso, mas farei dps de criar o delete de models
                if(file_exists('../public/image/courses/'.$course->image)) {
                    unlink('../public/image/courses/'.$course->image);
                }
                $course->delete();
            }
        }
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
