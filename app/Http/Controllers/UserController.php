<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Order;

class UserController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return view('user.user-dashboard', compact('orders'));
    }

    public function update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|string|min:4|confirmed',
        ]);
        $user = Auth::user();
        
        // در صورت وجود رمز عبور جدید، رمز عبور را به‌روز‌رسانی کنید
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        
        $user->update($request->all());
        return redirect()->back()->with('success', 'اطلاعات با موفقیت به‌روز شد');
    }
}
