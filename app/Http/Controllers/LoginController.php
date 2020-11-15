<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 
            'logout'
        ]);
    }

    public function login(Request $request)
    {
        return view('login', [
            'error' => $request->session()->get('error')
        ]);

    }

    public function loginAction(Request $request)
    {
        $creds = $request->only('email', 'password');
        if($creds['email'] && $creds['password']){
            if(Auth::attempt($creds)) {
                return redirect('/');
            } else {
                $request->session()->flash('error', 'Nenhum úsuario encontrado com esses dados.');
                return redirect('login');
            }
        }else {
            return redirect('login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
