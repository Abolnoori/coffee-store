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
        Schema::create('products', function (Blueprint $table) {
            $table->charset = 'utf32';
            $table->collation = 'utf32_general_ci';
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('price'); // قیمت محصول
            $table->integer('discount')->nullable(); // میزان تخفیف (اختیاری)
            $table->string('image'); //عکس محصول 
            $table->unsignedBigInteger('category_id'); // شناسه دسته‌بندی محصول
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
