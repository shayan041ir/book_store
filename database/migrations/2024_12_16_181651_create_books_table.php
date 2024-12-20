<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // مسیر عکس کتاب
            $table->string('name'); // نام کتاب
            $table->decimal('price', 10, 2); // قیمت
            $table->integer('page_count'); // تعداد صفحه
            $table->integer('stock');
            $table->string('translator')->nullable(); // مترجم
            $table->string('publisher'); // ناشر
            $table->string('author'); // نویسنده
            $table->year('publication_year'); // سال انتشار
            $table->boolean('is_best_seller')->default(false);// کتاب پرفروش
            $table->boolean('is_1001_books')->default(false); // جزو 1001 کتاب
            $table->timestamps(); // زمان ایجاد و بروزرسانی
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
};
