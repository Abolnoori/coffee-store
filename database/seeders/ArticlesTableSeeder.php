<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('articles')->insert([
            [
                'title' => 'جدیدترین رندرهای شیائومی طراحی جذاب آن را نشان می‌دهد',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را ...',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/post-4-1.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'رویداد رونمایی از سرفیس‌ها در تاریخ ۲۰ مهر برگزار می‌شود',
                'description' => 'اینطور که به نظر می‌رسد، مایکروسافت در نظر دارد رویداد مورد انتظار خود را به صورت حضوری و در تاریخ ۲۰ مهر برگزار کند…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/post-1.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '۶ تکنولوژی که دیرتر از رقبا به آیفون آمده‌اند
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت، شیائومی…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/post-2.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => '۱۰ بازیگر که با نقش‌های منفی جایزه اسکار گرفتند
',
                'description' => 'گاهی بازی در نقش شخصیت‌های منفی، سخت‌تر از بازی در قالب قطب مثبت ماجرا است. به ویژه اگر آن شخصیت خویی وحشی هم داشته باشد…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/post-3.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'بررسی ادوپرفیوم ویکتوریا سکرت
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/perfium-3.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'بررسی گوشی گلکسی A32 سامسونگ مدل 4G و 5G
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/blog-new-7.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'بررسی لپ‌تاپ گیمینگ HP OMEN 16 2021 مدل AMD
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/blog-new-6.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'اندروید ۱۳ آپدیت بی‌وقفه را راحت‌تر می‌کند
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/Android-update-installing-840w-472h.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'شیائومی جزیره پویا را به ردمی K60 اضافه نمی‌کند
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/dynamic-island.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'فناوری DLSS 3 می‌تواند به گرافیک‌های قدیمی انویدیا هم اضافه شود
',
                'description' => 'پیش‌تر خبری منتشر شد مبنی بر اینکه شیائومی می‌خواهد قابلیت جزیره پویا را به ردمی K60 اضافه کند؛ اما حالا متوجه شده‌ایم این اتفاق…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/nvidia_gpu.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'گوگل دکمه‌ی دستیار صوتی پیکسل واچ را به نمایش گذاشت
',
                'description' => 'اگرچه وقتی فناوری DLSS 3 رونمایی شد، در خبرها خواندیم این قابلیت منحصرا برای کارت‌های سری RTX 40 در دسترس قرار خواهد داشت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/Google-2-5.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'بررسی سرهمی زنانه کوی مدل نقاش؛ خوش‌دوخت و باکیفیت
',
                'description' => 'تا زمان رونمایی رسمی از محصولات جدید گوگل در رویداد ۱۴ مهر (۶ اکتبر) فاصله چندان زیادی باقی نمانده است. گوگل در همین راستا…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/blog-new-4.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'بررسی گوشی پوکو C31؛ ارزان‌قیمت، جذاب و عمر باتری بالا
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/blog-new-3.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'بررسی ساعت هوشمند میبرو لایت؛ ارزان‌قیمت و جذاب
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/blog-new-2.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'بررسی بازی کارتی افسانه‌های کاغذی؛ نیروی پیر
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/10/blog-new-1.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'کتاب‌هایی با شخصیت‌های منزوی؛ در باب تنهایی
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/09/blog4.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'دوربین ورزشی اکشن برند دیجی رونمایی شد
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/09/blog-3.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'title' => 'سامسونگ شاید کلید فیزیکی را کاملا از گوشی‌هایش حذف کند
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/09/blog-2.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],[
                'title' => 'اصولی ترین روش های نگهداری کتانی در طولانی مدت
',
                'description' => 'روز گذشته شیائومی اعلام کرد که گوشی CIVI 2 را در تاریخ ۵ مهر رسما رونمایی خواهد کرد. اما حالا قبل از رونمایی این ساعت…
',
                'image' => 'https://halochin.ir/coffee-store/wp-content/uploads/2022/09/blog-1.jpg',
                'category_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
