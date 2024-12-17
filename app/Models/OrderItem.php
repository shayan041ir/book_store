<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'book_id',
        'quantity',
        'price',
    ];

    /**
     * رابطه با جدول Orders (هر آیتم متعلق به یک سفارش است)
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * رابطه با جدول Books (هر آیتم یک کتاب را نشان می‌دهد)
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
