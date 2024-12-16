<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'quantity',
        'price',
    ];

    // ارتباط با مدل کتاب
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // ارتباط با مدل کاربر
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // محاسبه قیمت کل
    public function getTotalPriceAttribute()
    {
        return $this->quantity * $this->price;
    }
}
