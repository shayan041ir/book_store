<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
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
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048', // حداکثر حجم 2MB
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
        $book->image = $request->image;
        $book->name = $request->title;
        $book->price = $request->price;
        $book->page_count = $request->page_count;
        $book->stock = $request->stock;
        $book->translator = $request->translator;
        $book->publisher = $request->publisher;
        $book->author = $request->author;
        $book->publication_year	 = $request->published_year;
        $book->save();

        // اتصال دسته‌بندی‌ها
        if ($request->categories) {
            $book->categories()->attach($request->categories);
        }

        return redirect()->route('admin.dashboard')->with('success', 'کتاب با موفقیت اضافه شد');
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
}
