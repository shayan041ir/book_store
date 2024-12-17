<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Publisher;


class HomeControler extends Controller
{
    public function index()
    {
        $sliders = \App\Models\Slider::all();
        $categories = \App\Models\Category::all();
        $books = \App\Models\Book::all();; // لیست محصولات برای لینک‌دادن
        $bestSellingBooks = \App\Models\Book::where('is_best_seller', true)->get();
        $authors = \App\Models\Author::all();
        $translators = \App\Models\Translator::all();
        $publishers = \App\Models\Publisher::all();

        return view('home', compact('sliders', 'books', 'categories','bestSellingBooks','authors','translators','publishers'));
    }
}
