<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {               
        DB::table('categories')->insert([
            [
                'name' => 'چایی ساز',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'شکلات',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'قهوه',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
                        [
                'name' => 'قهوه ساز',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
                        [
                'name' => 'ماگ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // می‌توانید سایر دسته‌بندی‌ها را اینجا اضافه کنید
        ]);
    }
}
