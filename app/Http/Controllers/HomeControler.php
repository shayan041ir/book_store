<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Translator;


class HomeControler extends Controller
{
    public function index()
    {
        $sliders = \App\Models\Slider::all();
        $categories = \App\Models\Category::all();
        $books = \App\Models\Book::all(); // لیست محصولات برای لینک‌دادن
        $bestSellingBooks = \App\Models\Book::where('is_best_seller', true)->get();
        $authors = \App\Models\Author::all();
        $translators = \App\Models\Translator::all();
        $publishers = \App\Models\Publisher::all();

        return view('home', compact('sliders', 'books', 'categories', 'bestSellingBooks', 'authors', 'translators', 'publishers'));
    }

    public function show_author($id)
    {
        $author = Author::findOrFail($id);
        return view('authors.show', compact('author'));
    }

    public function show_translator($id)
    {
        $translator = Translator::findOrFail($id);
        return view('translators.show', compact('translator'));
    }

    public function show_publisher($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('publishers.show', compact('publisher'));
    }


    public function show1001()
    {
        $bestSellingBooks = \App\Models\Book::where('is_1001_books', true)->get();
        $books = \App\Models\Book::all();
        return view('template.section1001',compact('bestSellingBooks','books'));
    }
}
