<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){

        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users,username' ],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'min:7', 'max:255']
        ]);

        //essa linha não precisa pq tá usando um mutator dentro da classe user
        //$attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        auth()->login($user);

        session()->flash('success', 'Your account has been created');

        return redirect('/');

        // equivalente:
        // return redirect('/')->with('success', 'Your account has been created');
    }
}
