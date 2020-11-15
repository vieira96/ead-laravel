<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;


class UserController extends Controller
{
   
    public function register()
    {
        return view('register');
    }

    public function registerAction(UserRequest $request)
    {
        
        User::create($request->validated());
        //toda a logica esta no observer de user
        return redirect('/');
    }

    public function editAction(UserRequest $request)
    {
        $user = $request->user();
        $user->update($request->validated());

        return redirect('profile');
    }
}
