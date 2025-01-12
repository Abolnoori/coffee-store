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
        Schema::create('carts', function (Blueprint $table) {
            $table->charset = 'utf32';
            $table->collation = 'utf32_general_ci';            
            $table->id(); // شناسه یکتا سبد خرید
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // شناسه کاربری که سبد خرید متعلق به اوست
            $table->timestamps(); // زمان‌های ایجاد و بروزرسانی رکورد
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
