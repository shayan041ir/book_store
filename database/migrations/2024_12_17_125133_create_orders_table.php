<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // کلید خارجی به جدول کاربران
            $table->decimal('total_amount', 10, 2); // مبلغ کل سفارش
            $table->string('seller_name')->default('کتاب نگار');  // اضافه کردن نام فروشنده
            $table->string('status')->default('pending'); // وضعیت سفارش (pending, completed, cancelled)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
