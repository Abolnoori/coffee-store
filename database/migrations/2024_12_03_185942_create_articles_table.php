<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->charset = 'utf32';
            $table->collation = 'utf32_general_ci';
            $table->id(); // شناسه مقاله
            $table->string('title'); // عنوان مقاله
            $table->text('description'); // توضیحات مقاله
            $table->string('image'); // عکس مقاله
            $table->unsignedBigInteger('category_id'); // شناسه دسته‌بندی مقاله
            $table->timestamps(); // زمان‌های ایجاد و به‌روزرسانی
            // ایجاد کلید خارجی برای ارتباط با جدول article_categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
