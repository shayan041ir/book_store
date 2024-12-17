<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_amount',
        'status',
        'seller_name',
        'order_date',

    ];

    /**
     * رابطه با جدول کاربران (هر سفارش به یک کاربر تعلق دارد)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * رابطه با جدول OrderItems (هر سفارش می‌تواند چندین آیتم داشته باشد)
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
