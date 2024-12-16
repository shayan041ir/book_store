<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

class SignupController extends Controller
{
    public function index(){
        return view('template.signup');
    }
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        // $admin = new Admin();
        // $admin->name = $request->input('name');
        // $admin->email = $request->input('email');
        // $admin->password = bcrypt($request->input('password'));
        // $admin->save();


        return view('template.login');
    }
}
