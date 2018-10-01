<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = \App\User::all();

        return view('painel.users.index')->with(compact('users'));
    }

    public function create()
    {
        return view('painel.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $newUser = $request->only('name','email', 'password');

        $newUser['password'] = bcrypt($request->get('password'));

        \App\User::create($newUser);

        return redirect()->route('users');
    }

    public function edit($id)
    {
        dd($id);
    }

    public function delete($id)
    {
        $user = \App\User::find($id);

        $user->delete();

        return redirect()->route('users');
    }
}
