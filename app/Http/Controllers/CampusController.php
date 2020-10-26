<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;
use App\Models\StudentCourse;

class CampusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('registered', ['only' => ['cursoIndex', 'a']]);
    }

    public function cursoIndex()
    {
        dd('entrei');
    }

    public function index()
    {
        $user = Auth::user();
        $split_name = explode(' ',$user->name);
        $first_name = $split_name[0];

        $courses = Course::select()->get();

        $student_courses = StudentCourse::select()
            ->leftJoin('courses', 'course_id', '=', 'courses.id' )
            ->where('student_id', $user->id)
        ->get();

        return view('campus', [
            'user' => Auth::user(),
            'first_name' => $first_name,
            'all_courses' => $courses,
            'course_list' => $student_courses
        ]);
    }
    
}
