<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('painel.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (\Auth::attempt($credentials)) {
            return redirect()->intended('painel/dashboard');
        }

        return redirect('login')->with('status', 'Email ou senha incorretos');
    }

    public function logout()
    {
        if(\Auth::check()) {
            \Auth::logout();
        }
        return redirect()->route('login');
    }
}
