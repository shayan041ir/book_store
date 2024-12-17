<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id'); // لینک به کتاب
            $table->text('content'); // محتوای کامنت
            $table->boolean('is_approved')->default(false); // وضعیت تأیید توسط ادمین
            $table->timestamps();

            // تعریف کلید خارجی
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
