<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // نام نویسنده
            $table->text('description')->nullable(); // توضیحات در مورد نویسنده
            $table->string('image')->nullable(); // تصویر نویسنده
            $table->timestamps(); // زمان ایجاد و بروزرسانی
        });
    }

    public function down()
    {
        Schema::dropIfExists('authors');
    }
};
