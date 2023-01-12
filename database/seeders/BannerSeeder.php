<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{

    public function run()
    {
         Banner::insert([

            [
               'title_ar' => 'حفلاتك عندنا' ,
               'title_en' => 'We have your parties' ,
                'desc_ar' => 'تعرف على مناسباتك من خلال حفلتي.كوم مع كافة المعلومات اللازمة مثل القدرة الاستيعابية و اسعار حجز قاعات الفنادق و العروض الخاصة بالعروسين، تصفح الآن!' ,
                'desc_en' => 'Find out about your events through my party.com with all the necessary information such as capacity, hotel hall reservation prices and special offers for the newlyweds. Browse now!' ,
               'img'  => 'banners/1.jpg',
               'created_at' => now()
            ] ,

            [
                'title_ar' => 'حفلاتك عندنا' ,
                'title_en' => 'We have your parties' ,
                 'desc_ar' => 'تعرف على مناسباتك من خلال حفلتي.كوم مع كافة المعلومات اللازمة مثل القدرة الاستيعابية و اسعار حجز قاعات الفنادق و العروض الخاصة بالعروسين، تصفح الآن!' ,
                 'desc_en' => 'Find out about your events through my party.com with all the necessary information such as capacity, hotel hall reservation prices and special offers for the newlyweds. Browse now!' ,
                'img'  => 'banners/2.jpg',
                'created_at' => now()
            ] ,

            [
                'title_ar' => 'حفلاتك عندنا'  ,
                'title_en' => 'We have your parties' ,
                 'desc_ar' => 'تعرف على مناسباتك من خلال حفلتي.كوم مع كافة المعلومات اللازمة مثل القدرة الاستيعابية و اسعار حجز قاعات الفنادق و العروض الخاصة بالعروسين، تصفح الآن!' ,
                 'desc_en' => 'Find out about your events through my party.com with all the necessary information such as capacity, hotel hall reservation prices and special offers for the newlyweds. Browse now!' ,
                'img'  => 'banners/3.jpg',
                'created_at' => now()
            ] ,

         ]);
    }
}
