<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use App\Http\Requests\CourseRequest;

use App\Models\Rating;
use App\Models\Course;
use App\Models\StudentCourse;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'except' => 'courseInfo'
        ]);
    }

    public function courseInfo($slug)
    {
        $is_student = false;
        $user = Auth::user();
        $course = Course::select()->where('slug', $slug)->first();
        if(!$course){
            return redirect('/');
        }
        
        $ratings = Rating::select()->where('course_id', $course->id)->get();
        if($user){
            $is_student = StudentCourse::select()->where('course_id', $course->id)->where('student_id', $user->id)->first();
            if($is_student) {
                $is_student = true;
            }
        }

        $rating_average = Rating::select()->where('course_id', $course->id)->avg('stars');
        $rating_average = round($rating_average);

        return view('course', [
            'user' => $user,
            'is_student' => $is_student,
            'course' => $course,
            'ratings' => $ratings,
            'rating_average' => $rating_average
        ]);
    }

    public function signup($slug)
    {
        $user = Auth::user();
        $course = Course::select()->where('slug', $slug)->first();
        if($course) {
            $is_student = StudentCourse::select()->where('course_id', $course->id)->where('student_id', $user->id)->first();
            if($is_student) {
                return redirect('/campus/'.$slug);
            }
            $new_course = new StudentCourse();
            $new_course->course_id = $course->id;
            $new_course->student_id = $user->id;
            $new_course->save();
            
            return redirect('/campus/'.$slug);
        }
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

    public function editCourse(Course $course, Request $request)
    {
        $response = Gate::inspect('update', $course);
        if($response->allowed()){
            return view('dashboard.edit-course', [
                'course' => $course,
                'user' => $request->user(),
                'success' => $request->session()->get('success')
            ]);
        }
        return redirect('/dashboard/courses');
    }

    public function editCourseAction(Course $course, CourseRequest $request)
    {   
        if($course->update($request->validated())){
            $request->session()->flash('success', 'Curso atualizado com sucesso');
        }
        return redirect('/dashboard/course/'.$course->id.'/edit');
    }

    public function deleteCourse(Course $course)
    {
        $response = Gate::inspect('delete', $course);
        if($response->allowed()){
            //deleta a imagem do curso antes de deletar o curso
            //TODO: deletar todos os modulos do curso, mas farei dps de criar o delete de models
            if(file_exists('../public/image/courses/'.$course->image)) {
                unlink('../public/image/courses/'.$course->image);
            }
            $course->delete();
        }
        return redirect('/dashboard/courses');
    }
}
