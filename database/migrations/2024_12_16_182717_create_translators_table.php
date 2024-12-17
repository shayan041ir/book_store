<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslatorsTable extends Migration
{
    public function up()
    {
        Schema::create('translators', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // نام مترجم
            $table->text('description')->nullable(); // توضیحات در مورد مترجم
            $table->string('image')->nullable(); // تصویر مترجم
            $table->timestamps(); // زمان ایجاد و بروزرسانی
        });
    }

    public function down()
    {
        Schema::dropIfExists('translators');
    }
};
