<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Module;

use App\Services\ModuleService;

use App\Http\Requests\ModuleRequest;

class ModuleController extends Controller
{
    protected $module_service;
    public function __construct(ModuleService $module_service)
    {
        $this->middleware('auth');
        $this->middleware('administrator');
        $this->module_service = $module_service;
    }

    public function modules(Course $course)
    {
        $modules = Module::select()->where('course_id', $course->id)->get();
        $user = Auth::user();

        return view('dashboard.course-modules',[
            'user' => $user,
            'modules' => $modules,
            'course' => $course
        ]);
    }

    public function newAction(ModuleRequest $request, Course $course)
    {
        $this->module_service->new($request, $course);
        return redirect()->back();
    }

    public function del(Course $course, Module $module)
    {
        $this->module_service->delete($module, $course);
        return redirect()->back();
    }
    
}
