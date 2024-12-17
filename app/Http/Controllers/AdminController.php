<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Admin;
use App\Models\Book;
use App\Models\User;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Author;
use App\Models\Translator;
use App\Models\Publisher;
use App\Models\Comment;

class AdminController extends Controller
{

    public function index()
    {
        $admins = Admin::all();
        $users = User::all();
        $books = Book::all();
        $sliders = Slider::all();
        $categories = Category::all();
        $authors = Author::all();
        $translators = Translator::all();
        $publishers = Publisher::all();
        $comments = Comment::where('is_approved', false)->get();        

        return view('admin.admin-dashboard', compact('admins', 'users', 'books', 'sliders', 'categories', 'authors','translators','publishers','comments'));
    }

    // admin manage
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

    // user manage
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



    // مدریت اسلایدر 
    public function showSliderManagement()
    {
        $sliders = Slider::all();
        $books = Book::all(); // لیست محصولات برای لینک‌دادن
        return view('admin.add-slider', compact('sliders', 'books'));
    }

    public function deleteSlider($id)
    {
        $slider = Slider::findOrFail($id);

        // حذف تصویر از فضای ذخیره‌سازی
        if ($slider->image_path) {
            Storage::disk('public')->delete($slider->image_path);
        }

        // حذف رکورد از دیتابیس
        $slider->delete();

        return redirect()->back()->with('success', 'اسلاید با موفقیت حذف شد!');
    }

    public function uploadSlider(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'book_id' => 'nullable|exists:books,id',
            'title' => 'required|string|max:255',
        ]);

        $path = $request->file('image_path')->store('sliders', 'public');

        if (Slider::count() >= 4) {
            $oldestSlider = Slider::oldest()->first();
            if ($oldestSlider) {
                Storage::disk('public')->delete($oldestSlider->image_path);
                $oldestSlider->delete();
            }
        }

        Slider::create([
            'image_path' => $path,
            'book_id' => $request->book_id,
            'title' => $request->title,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'اسلاید جدید با موفقیت اضافه شد!');
    }


    // author
    public function showauthor()
    {
        $authors = Author::all();
        return view('admin.admin-dashboard', compact('authors'));
    }
    public function authorsstore(Request $request)
    {
        // dd($request->validate(['image']));
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        // آپلود تصویر
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('authors', 'public');
        }

        // ذخیره اطلاعات نویسنده
        $author = new Author();
        $author->name = $request->name;
        $author->description = $request->description;
        $author->image = $imagePath;
        $author->save();

        return redirect()->back()->with('success', 'نویسنده جدید با موفقیت اضافه شد!');
    }
    public function authorsdestroy($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return redirect()->back()->with('error', 'نویسنده مورد نظر پیدا نشد!');
        }
        $author->delete();
        return redirect()->back()->with('success', 'نویسنده با موفقیت حذف شد!');
    }


    // translators

    public function showtranslator()
    {
        $translators = Translator::all();
        return view('admin.admin-dashboard', compact('translators'));
    }
    public function translatorstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        // آپلود تصویر
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('translators', 'public');
        }

        // ذخیره اطلاعات مترجم
        $translators = new Translator();
        $translators->name = $request->name;
        $translators->description = $request->description;
        $translators->image = $imagePath;
        $translators->save();

        return redirect()->back()->with('success', 'مترجم جدید با موفقیت اضافه شد!');
    }
    public function translatordestroy($id)
    {
        $translators = Translator::find($id);
        if (!$translators) {
            return redirect()->back()->with('error', 'مترجم مورد نظر پیدا نشد!');
        }
        $translators->delete();
        return redirect()->back()->with('success', 'مترجم با موفقیت حذف شد!');
    }



    // publishers

    public function showpublisher()
    {
        $publishers = Publisher::all();
        return view('admin.admin-dashboard', compact('translators'));
    }
    public function publisherstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        // آپلود تصویر
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('publishers', 'public');
        }

        // ذخیره اطلاعات ناشر
        $publishers = new Publisher();
        $publishers->name = $request->name;
        $publishers->description = $request->description;
        $publishers->image = $imagePath;
        $publishers->save();

        return redirect()->back()->with('success', 'ناشر جدید با موفقیت اضافه شد!');
    }
    public function publisherdestroy($id)
    {
        $publishers = Publisher::find($id);
        if (!$publishers) {
            return redirect()->back()->with('error', 'ناشر مورد نظر پیدا نشد!');
        }
        $publishers->delete();
        return redirect()->back()->with('success', 'ناشر با موفقیت حذف شد!');
    }






}
