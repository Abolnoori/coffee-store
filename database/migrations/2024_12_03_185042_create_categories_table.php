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
        Schema::create('categories', function (Blueprint $table) {
            $table->charset = 'utf32';
            $table->collation = 'utf32_general_ci';
            $table->id(); // شناسه دسته‌بندی
            $table->string('name'); // نام دسته‌بندی
            $table->text('description')->nullable(); // توضیحات دسته‌بندی (اختیاری)
            $table->timestamps(); // زمان‌های ایجاد و به‌روزرسانی
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
