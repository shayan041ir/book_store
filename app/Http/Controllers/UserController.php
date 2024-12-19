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
        $orders = Order::with('items.book')->get();
        return view('user.user-dashboard', compact('orders'));
    }

    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:4|confirmed',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|regex:/^\d{10,12}$/',
        ]);
        $user = Auth::user();

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->address = $validatedData['address'] ?? $user->address;
        $user->phone = $validatedData['phone'] ?? $user->phone;
        
        // به‌روزرسانی رمز عبور در صورت وجود
        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();
        
        return redirect()->back()->with('success', 'اطلاعات با موفقیت به‌روز شد');
    }
}
