<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('seesions:create');
    }

    public function store(){
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $successLoggedIn = auth()->attempt($attributes);

        if($successLoggedIn){
            return redirect('/')->with(['success' => 'Welcome back!']);
        }

        return back()->withErrors(['email' => 'The provided credentials could not be verified.']);

        // equivalente:
        // throw ValidationException::withMessages([
        //     'email' => 'The provided credentials could not be verified.'
        // ]);
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
