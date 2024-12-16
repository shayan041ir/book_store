<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('book_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade'); // ارتباط با جدول کتاب‌ها
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // ارتباط با جدول دسته‌بندی
            $table->timestamps(); // زمان ایجاد و بروزرسانی
        });
    }

    public function down()
    {
        Schema::dropIfExists('book_category');
    }
}
;
