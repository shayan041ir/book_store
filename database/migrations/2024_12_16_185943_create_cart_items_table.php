<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id'); // لینک به کتاب
            $table->unsignedBigInteger('user_id'); // لینک به کاربر
            $table->integer('quantity'); // تعداد
            $table->decimal('price', 10, 2); // قیمت محصول
            $table->timestamps();

            // تعریف کلیدهای خارجی
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
