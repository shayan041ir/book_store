<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('Admin.add-category', compact('categories'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // حذف ارتباط دسته‌بندی با محصولات
        $category->products()->detach();

        // حذف دسته‌بندی
        $category->delete();

        return redirect()->back()->with('success', 'Category deleted successfully!');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);
        $categories = Category::all();


        return redirect()->back()->with('success', 'Category added successfully!');
    }
}
