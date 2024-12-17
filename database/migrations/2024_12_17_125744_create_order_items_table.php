<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // کلید خارجی به جدول سفارش‌ها
            $table->foreignId('book_id')->constrained('books')->onDelete('cascade'); // کلید خارجی به جدول کتاب‌ها
            $table->integer('quantity'); // تعداد محصول در سفارش
            $table->decimal('price', 10, 2); // قیمت هر کتاب در زمان خرید
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
