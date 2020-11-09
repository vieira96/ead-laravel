<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
