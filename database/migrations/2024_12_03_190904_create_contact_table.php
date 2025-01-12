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
        Schema::create('contact', function (Blueprint $table) {
            $table->charset = 'utf32';
            $table->collation = 'utf32_general_ci';            
            $table->id(); // شناسه
            $table->string('name'); // نام فرستنده
            $table->string('email'); // ایمیل فرستنده
            $table->string('subject'); // موضوع پیام
            $table->text('message'); // متن پیام
            $table->timestamps(); // زمان‌های ایجاد و به‌روزرسانی
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
    }
};
