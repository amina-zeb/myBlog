<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }
    public function store(){
        $attributes = request()->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users,email|max:255',
            'username'=>['required','max:255','min:3', Rule::unique('users','username')],
            'password'=>'required|max:255|min:7',
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);
        
        Auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
