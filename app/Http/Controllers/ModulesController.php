<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('administrator');
    }

    public function modules($id)
    {
        $user = Auth::user();
        return view('dashboard.course-modules',[
            'user' => $user
        ]);
    }
}
