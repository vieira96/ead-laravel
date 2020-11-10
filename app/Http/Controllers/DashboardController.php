<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

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

//        $img = Image::make('foo.jpg')->resize(300, 200);
//       return $img->response('jpg');
        
        return view('dashboard.new-course');
    }

    public function editCourse($id)
    {
        $course = Course::find($id);

        return view('dashboard.edit', [
            'course' => $course
        ]);
    }
}
