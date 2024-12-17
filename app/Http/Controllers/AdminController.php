<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Book;
use App\Models\User;
use App\Models\Slider;
use App\Models\Category;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::all();
        $users = User::all();
        $books = Book::all();
        $sliders = Slider::all();
        $categories = Category::all();
        return view('admin.admin-dashboard', compact('admins','users','books','sliders','categories'));
    }

    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:4',
        ]);

        // بررسی وجود ایمیل تکراری (اختیاری در اینجا)
        if (Admin::where('email', $request->email)->exists()) {
            return redirect()->back()->withErrors(['email' => 'این ایمیل قبلاً ثبت شده است.']);
        }

        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));
        $admin->save();
        $msj = "Admin added successfully!";
        $admins = Admin::all();
        return view('admin.admin-dashboard', compact('admins'))->with('msj');
    }

    public function adminupdate(Request $request)
    {
        // اعتبارسنجی اطلاعات ورودی
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:4|confirmed',
        ]);

        $admin = Auth::guard('admin')->user();

        if (!$admin) {
            return redirect()->back()->withErrors(['error' => 'ادمین یافت نشد.']);
        }
        // به‌روز‌رسانی اطلاعات ادمین
        $admin->name = $request->input('name');

        // در صورت وجود رمز عبور جدید، رمز عبور را به‌روز‌رسانی کنید
        if ($request->filled('password')) {
            $admin->password = Hash::make($request->input('password'));
        }

        // ذخیره تغییرات
        $admin->save();

        $msj = "Admin updated successfully!";
        $admins = Admin::all();

        // بازگرداندن پیام موفقیت
        return redirect()->route('admin.dashboard')->with('success', $msj);
    }

    public function delete($id)
    {
        $admin = Admin::findOrFail($id); // ادمین مورد نظر را پیدا کنید
        // حذف ادمین
        $admin->delete();
        return redirect()->route('admin.dashboard')->with('success', "ادمین {$admin->name} با موفقیت حذف شد.");
    }


    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:4',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('admin.dashboard')->with('success', "کاربر جدید با موفقیت اضافه شد");
    }
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        // حذف کاربر
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', "کاربر {$user->name} با موفقیت حذف شد.");
    }

}
