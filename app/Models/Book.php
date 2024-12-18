<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'name', 'price', 'page_count', 'stock', 'translator', 'publisher', 'author', 'publication_year', 'is_best_seller'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'book_category');
    }

    // ارتباط با کامنت‌ها
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // ارتباط با اسلایدرها
    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }

    // ارتباط با آیتم‌های سبد خرید
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

}
