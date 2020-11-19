<?php

namespace App\Services;

use App\Http\Requests\ModuleRequest;

use App\Models\Course;
use App\Models\Module;


class ModuleService {

    public function new(ModuleRequest $request, Course $course)
    {
        $validated = $request->validated();
        $new_module = new Module();
        $new_module->name = $request->input('name');
        $new_module->course_id = $course->id;
        $new_module->save();
    }
}
