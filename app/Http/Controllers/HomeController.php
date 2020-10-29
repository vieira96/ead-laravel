<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;
use App\Models\StudentCourse;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['signup']]);
    }

    public function index()
    {
        $user = Auth::user();
        $courses = Course::select()->get();

        return view('home', [
            'user' => $user,
            'course_list' => $courses
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
        $courses = Course::select()->get();
        if($user){
            $is_student = StudentCourse::select()->where('course_id', $course->id)->where('student_id', $user->id)->first();
            if($is_student) {
                $is_student = true;
            }
        }

        return view('course', [
            'user' => $user,
            'is_student' => $is_student,
            'course_list' => $courses,
            'course' => $course
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
}
