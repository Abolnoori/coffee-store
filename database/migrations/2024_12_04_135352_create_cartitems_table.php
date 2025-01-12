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
        Schema::create('cartitems', function (Blueprint $table) {
            $table->charset = 'utf32';
            $table->collation = 'utf32_general_ci';            
            $table->id(); // شناسه یکتا آیتم سبد خرید
            $table->foreignId('cart_id')->constrained('carts')->onDelete('cascade'); // شناسه سبد خرید
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // شناسه محصول
            $table->integer('quantity'); // تعداد محصول
            $table->string('price'); // قیمت محصول
            $table->integer('discount')->nullable(); // تخفیف محصول، اگر وجود داشته باشد
            $table->timestamps(); // زمان‌های ایجاد و بروزرسانی رکورد
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartitems');
    }
};
