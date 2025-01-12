<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'category_id'=> 1,
                'created_at' => now(),
                'description'=> 'وزن دستگاه: ۵ کیلوگرم...',
                'discount'=> 19,
                'image'=> 'https://halochin.ir/coffee-store/wp-content/uploads/2023/11/product-3.png',            
                'name'=> 'چای ساز برقی استیل بیشل مدل BLTM009 – bishel‏',
                'price'=> '3,400,000',
                'updated_at' => now(),
            ],
            [
                'category_id'=> 1,
                'created_at' => now(),
                'description'=> 'وزن دستگاه: ۵ کیلوگرم...' ,
                'discount'=> 0,
                'image'=> 'https://halochin.ir/coffee-store/wp-content/uploads/2023/11/product-1.png',    
                'name'=> 'دستگاه قهوه ترک ساز آرچلیک مدل TKM 3940',
                'price'=> '229,000',
                'updated_at' => now(),
            ],
            [
                'category_id'=> 2,
                'created_at' => now(),
                'description'=>  'وزن دستگاه: ۵ کیلوگرم...',
                'discount'=> 0,
                'image'=> 'https://halochin.ir/coffee-store/wp-content/uploads/2023/11/product-7-min.png',  
                'name'=> 'بسته 60 عددی شکلات تلخ قهوه ویولتا فرمند ۵۵ گرمی',
                'price'=> '185,000',
                'updated_at' => now(),
            ],
            [
                'category_id'=> 2,
                'created_at' => now(),
                'description'=> 'فنجان سرامیکی زیبا برای لذت بردن از قهوه.',
                'discount'=> 28,
                'image'=> 'https://halochin.ir/coffee-store/wp-content/uploads/2023/11/product-6-min.png',               
                'name'=> 'پودر قهوه ترک ویژه عربیکا ۷۰ درصد مقدار ۲۵۰ گرم',
                'price'=> '140.000',
                'updated_at' => now(),
            ],
            [
                'category_id'=> 3,
                'created_at' => now(),
                'description'=> 'فنجان سرامیکی زیبا برای لذت بردن از قهوه.' ,
                'discount'=> 0,
                'image'=> 'https://halochin.ir/coffee-store/wp-content/uploads/2023/11/product-5-min.png',
                'name'=> 'دانه قهوه ترکیبی FALL Blend اصل کلمبیا مقدار 250 گرم',
                'price'=> '225,000',
                'updated_at' => now(),
            ],[
                'category_id'=> 3,
                'created_at' => now(),
                'description'=> 'فنجان سرامیکی زیبا برای لذت بردن از قهوه.',
                'discount'=> 28,
                'image'=> 'https://halochin.ir/coffee-store/wp-content/uploads/2023/11/product-6-min.png',
                'name'=> 'پودر قهوه ترک ویژه عربیکا ۷۰ درصد مقدار ۲۵۰ گرم',
                'price'=> '195,000',
                'updated_at' => now(),
            ],[
                'category_id'=> 3,
                'created_at' => now(),
                'description'=> 'فنجان سرامیکی زیبا برای لذت بردن از قهوه.'  ,
                'discount'=> 15,
                'image'=> 'https://halochin.ir/coffee-store/wp-content/uploads/2023/11/product-8-min.png',
                'name'=> 'دانه قهوه ترکیبی 250 گرم HOUSE Blend 100% Arabica',
                'price'=> '279,000',
                'updated_at' => now(),
            ],[
                'category_id'=> 4,
                'created_at' => now(),
                'description'=> 'فنجان سرامیکی زیبا برای لذت بردن از قهوه.' ,
                'discount'=> 0,
                'image'=> 'https://halochin.ir/coffee-store/wp-content/uploads/2023/11/product-1.png',
                'name'=> 'دستگاه قهوه ترک ساز آرچلیک مدل TKM 3940',
                'price'=> '229,000',
                'updated_at' => now(),
            ],
            [
                'category_id'=> 4,
                'created_at' => now(),
                'description'=> 'فنجان سرامیکی زیبا برای لذت بردن از قهوه.' ,
                'discount'=> 16,
                'image'=> 'https://halochin.ir/coffee-store/wp-content/uploads/2023/11/product-4-min.png',
                'name'=> 'قهوه ساز برقی سینبو مدل SCM 2928 با بدنه سرامیکی',
                'price'=> '213,000',
                'updated_at' => now(),
            ],
            [
                'category_id'=> 5,
                'created_at' => now(),
                'description'=> 'فنجان سرامیکی زیبا برای لذت بردن از قهوه.' ,
                'discount'=> 0,
                'image'=> 'https://halochin.ir/coffee-store/wp-content/uploads/2023/11/product-2-min.png',
                'name'=> 'ماگ در دار سیلیکونی با بدنه ی سرامیکی طرح استارباکس',
                'price'=> '560,000',
                'updated_at' => now(),
            ],
              
            
        ]);
    }
}
