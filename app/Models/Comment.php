<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'content',
        'is_approved',
    ];

    // ارتباط با مدل کتاب
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    // بررسی تأیید شدن کامنت
    public function isApproved()
    {
        return $this->is_approved;
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
