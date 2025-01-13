<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('admin.add-book', compact('books', 'categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif', // حداکثر حجم 2MB
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'page_count' => 'required|integer|min:1',
            'stock' => 'required|integer|min:0',
            'translator' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'category_id' => 'nullable|array',  // بررسی وجود دسته‌بندی در جدول
            'category_id.*' => 'exists:categories,id',  // بررسی وجود دسته‌بندی در جدول
            'is_best_seller' => 'nullable|boolean',
            'is_1001_books' => 'nullable|boolean',
        ], [
            'image.required' => 'تصویر کتاب الزامی است.',
            'image.image' => 'فایل باید یک تصویر باشد.',
            'image.mimes' => 'فرمت تصویر باید jpg, jpeg, png یا gif باشد.',
            'image.max' => 'حجم تصویر نباید بیشتر از 2 مگابایت باشد.',
            'title.required' => 'عنوان کتاب الزامی است.',
            'price.required' => 'قیمت کتاب الزامی است.',
            'price.numeric' => 'قیمت باید عدد باشد.',
            'page_count.required' => 'تعداد صفحات الزامی است.',
            'page_count.integer' => 'تعداد صفحات باید عدد صحیح باشد.',
            'published_year.required' => 'سال انتشار الزامی است.',
            'published_year.digits' => 'سال انتشار باید 4 رقم باشد.',
            'published_year.min' => 'سال انتشار نمی‌تواند کمتر از 1900 باشد.',
            'published_year.max' => 'سال انتشار نمی‌تواند بیشتر از سال جاری باشد.',
            'category_id.required' => 'انتخاب دسته‌بندی الزامی است.',
            'category_id.exists' => 'دسته‌بندی انتخاب‌شده معتبر نیست.',
        ]);



        // آپلود تصویر
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
        }


        $book = new Book();
        $book->image = $imagePath; // مقدار درست مسیر تصویر
        $book->name = $request->title;
        $book->price = $request->price;
        $book->page_count = $request->page_count;
        $book->stock = $request->stock;
        $book->translator = $request->translator;
        $book->publisher = $request->publisher;
        $book->author = $request->author;
        $book->publication_year = $request->published_year;
        $book->is_best_seller = $request->has('is_best_seller') ? true : false; // چک کردن مقدار چک‌باکس
        $book->is_1001_books = $request->has('is_1001_books') ? true : false;

        $book->save();


        // اتصال دسته‌بندی‌ها
        if ($request->category_id) {
            $book->categories()->attach($request->category_id);
        }


        return redirect()->route('admin.dashboard')->with('success', 'کتاب با موفقیت اضافه شد');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();

        return view('admin.add-book', compact('book', 'categories'));
    }
    public function update(Request $request)
    {
        // $book = Book::findOrFail($id);
        $book = Book::where('name', $request->input('title'))->first();
        if (!$book) {
            return redirect()->back()->withErrors(['msg' => 'محصولی با این نام یافت نشد.']);
        }
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // حداکثر حجم 2MB
            'title' => 'required|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'page_count' => 'nullable|integer|min:1',
            'stock' => 'nullable|integer|min:0',
            'translator' => 'nullable|string|max:255',
            'publisher' => 'nullable|string|max:255',
            'author' => 'nullable|string|max:255',
            'published_year' => 'nullable|integer|digits:4|min:1900|max:' . date('Y'),
            'category_id' => 'nullable|array',  // بررسی وجود دسته‌بندی در جدول
            'category_id.*' => 'exists:categories,id',  // بررسی وجود دسته‌بندی در جدول
            'is_best_seller' => 'nullable|boolean',
            'is_1001_books' => 'nullable|boolean',
        ]);

        // آپلود تصویر جدید در صورت موجود بودن
        if ($request->hasFile('image')) {
            // حذف تصویر قدیمی
            if ($book->image && Storage::disk('public')->exists($book->image)) {
                Storage::disk('public')->delete($book->image);
            }
            // ذخیره تصویر جدید
            $imagePath = $request->file('image')->store('books', 'public');
            $book->image = $imagePath;
        }

        // // به‌روزرسانی فیلدهای کتاب
        // $book->name = $request->title;
        // $book->price = $request->price;
        // $book->page_count = $request->page_count;
        // $book->stock = $request->stock;
        // $book->translator = $request->translator;
        // $book->publisher = $request->publisher;
        // $book->author = $request->author;
        // $book->publication_year = $request->published_year;
        // $book->is_best_seller = $request->has('is_best_seller') ? true : false;
        // $book->is_1001_books = $request->has('is_1001_books') ? true : false;

        // // ذخیره تغییرات
        // $book->save();

        // // به‌روزرسانی دسته‌بندی‌ها
        // if ($request->category_id) {
        //     $book->categories()->sync($request->category_id);
        // } else {
        //     $book->categories()->detach();
        // }

        // به‌روزرسانی فیلدهایی که تغییر کرده‌اند
        $data = $request->only(['name', 'price', 'stock', 'page_count', 'translator', 'publisher','author','published_year','is_best_seller','is_1001_books']);
        foreach ($data as $key => $value) {
            if ($value !== null) {
                $book->$key = $value;
            }
        }

        $book->save();
        return redirect()->route('admin.dashboard')->with('success', 'کتاب با موفقیت به‌روزرسانی شد');
    }


    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        if ($book->image && Storage::disk('public')->exists($book->image)) {
            Storage::disk('public')->delete($book->image);
        }

        $book->categories()->detach();

        $book->delete();

        return redirect()->back()->with('success', 'کتاب با موفقیت حذف شد');
    }

    public function show($id)
    {
        $book = Book::with('comments.user')->findOrFail($id);

        // ارسال محصول به ویو
        return view('template.book-detailes', compact('book'));
    }

    public function filter(Request $request)
    {
        $query = Book::query();


        $sliders = \App\Models\Slider::all();
        $bestSellingBooks = \App\Models\Book::where('is_best_seller', true)->get();
        $authors = \App\Models\Author::all();
        $translators = \App\Models\Translator::all();
        $publishers = \App\Models\Publisher::all();

        // اعمال جستجو
        if ($request->has('search') && !empty($request->search)) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('author', 'like', '%' . $request->search . '%');
        }

        // اعمال فیلتر دسته‌بندی
        if ($request->has('category') && $request->category !== 'all') {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
        }

        // دریافت لیست کتاب‌ها
        $books = $query->get();

        // دریافت لیست دسته‌بندی‌ها
        $categories = Category::all();

        // بازگرداندن ویو با نتایج
        return view('home', compact('books', 'categories', 'sliders', 'bestSellingBooks', 'authors', 'translators', 'publishers'));
    }

    public function show1($id)
    {
        // یافتن کتاب بر اساس شناسه
        $book = Book::findOrFail($id);

        // ارسال داده‌ها به ویو
        return view('home', compact('book'));
    }
}
