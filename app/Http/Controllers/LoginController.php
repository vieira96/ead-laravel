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

    public function register(Request $request)
    {
        return view('register', [
            'error' => $request->session()->get('error')
        ]);
    }

    public function registerAction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
            'email' => ['required', 'unique:users', 'email', 'max:255',],
        ]);

        if($validator->fails()) {
            $request->session()->flash('error', 'Ocorreu um erro, verifique os dados e tente novamente.');
            return redirect('/register')->withInput();
        }

        $creds = $request->all();
        
        $hasEmail = User::where('email', $creds['email'])->count();
        if($hasEmail > 0) {
            $request->session()->flash('error', 'Já existe um usuário cadastrado com esse e-mail');
            return redirect('register');
        }

        if($creds['password'] !== $creds['confirm-password']) {
            $request->session()->flash('error', 'Senhas não conferem.');
            return redirect('register')->withInput();
        }

        $newUser = new User();
        $newUser->name = $creds['name'];
        $newUser->email = $creds['email'];
        $newUser->password = password_hash($creds['password'], PASSWORD_DEFAULT);
        $newUser->save();


        Auth::login($newUser);
        
        return redirect('/');
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
