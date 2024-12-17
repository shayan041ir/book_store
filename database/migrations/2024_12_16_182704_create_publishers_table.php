<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublishersTable extends Migration
{
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // نام ناشر
            $table->text('description')->nullable(); // توضیحات در مورد ناشر
            $table->string('image')->nullable(); // تصویر ناشر
            $table->timestamps(); // زمان ایجاد و بروزرسانی
        });
    }

    public function down()
    {
        Schema::dropIfExists('publishers');
    }
};
