<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;


class HomeController extends Controller
{

    public function __invoke()
    {
        $user = Auth::user();
        $courses = Course::select()->get();

        return view('home', [
            'user' => $user,
            'course_list' => $courses
        ]);
    }
}
