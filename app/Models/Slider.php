<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'image_path',
        'title',
    ];

    // ارتباط با مدل کتاب
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
