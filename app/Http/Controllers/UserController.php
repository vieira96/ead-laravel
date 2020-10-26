<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $user = Auth::user();
        $split_name = explode(' ',$user->name);
        $first_name = $split_name[0];

        $courses = Course::select()->get();


        return view('profile', [
            'user' => Auth::user(),
            'first_name' => $first_name,
            'all_courses' => $courses,
            'error' => $request->session()->get('error'),
            'success' => $request->session()->get('success')
        ]);
    }

    public function editAction(Request $request)
    {
        $loggedUser = Auth::user();
        
        $user = User::find($loggedUser->id);

        $name = $request->input('name');
        $password = $request->input('password');
        $password_confirm = $request->input('password-confirm');

        if($password === $password_confirm) {
            $user->name = $name;
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            $user->save();
            $request->session()->flash('success', 'Dados Atualizados com successo');
        } else {
            $request->session()->flash('error', 'Senhas não conferem');
        }

        return redirect('profile');
        
    }
}
