<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // نام دسته‌بندی
            $table->timestamps(); // زمان ایجاد و بروزرسانی
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
