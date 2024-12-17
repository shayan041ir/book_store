<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('template.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');


        // تلاش برای احراز هویت به عنوان ادمین
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }


        // تلاش برای احراز هویت به عنوان کاربر معمولی
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user.dashboard');
        }

        // اگر هیچ‌کدام موفق نبود
        return back()->withErrors(['message' => 'Invalid credentials']);
    }
    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        auth()->guard('web')->logout();
        return redirect('/');
    }
}
