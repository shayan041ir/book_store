<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartitems', function (Blueprint $table) {
            $table->id(); // شناسه اصلی
            $table->foreignId('cart_id')->constrained()->onDelete('cascade'); // ارتباط با جدول carts
            $table->foreignId('book_id')->constrained()->onDelete('cascade'); // ارتباط با جدول محصولات
            $table->integer('quantity'); // تعداد محصول
            $table->decimal('price', 10, 2); // قیمت واحد محصول
            $table->timestamps(); // زمان ایجاد و به‌روزرسانی
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartitems');
    }
};
