<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{

    public function run()
    {
        Service::insert([

            [
                'name_ar' => 'صاله افراح' ,
                'name_en' => 'Wedding Hall' ,
                'created_at' => now() ,
            ] ,

            [
                'name_ar' => 'بوفيه' ,
                'name_en' => 'buffet' ,
                'created_at' => now() ,
            ] ,


            [
                'name_ar' => 'ديجي' ,
                'name_en' => 'DJ' ,
                'created_at' => now() ,
            ] ,

            [
                'name_ar' => ' كوافير نسائي' ,
                'name_en' => "Women's hairdresser" ,
                'created_at' => now() ,
            ] ,


            [
                'name_ar' => 'كوافير رجالي' ,
                'name_en' => "Men's hairdresser" ,
                'created_at' => now() ,
            ] ,

            [
                'name_ar' => 'حجز سيارات' ,
                'name_en' => 'Car reservation' ,
                'created_at' => now() ,
            ] ,

            [
                'name_ar' => 'اتيليه العروسه' ,
                'name_en' => 'Atelier the bride' ,
                'created_at' => now() ,
            ] ,

            [
                'name_ar' => 'بدله العريس' ,
                'name_en' => "groom's suit" ,
                'created_at' => now() ,
            ] ,

            [
                'name_ar' => 'الفوتوجرافر' ,
                'name_en' => 'Photographer' ,
                'created_at' => now() ,
            ] ,


            [
                'name_ar' => 'بوكيه الورد' ,
                'name_en' => 'Flower bouquet' ,
                'created_at' => now() ,
            ] ,

            [
                'name_ar' => 'مصممي الكوشه' ,
                'name_en' => 'Kosha designers' ,
                'created_at' => now() ,
            ] ,


            [
                'name_ar' => 'المأذون' ,
                'name_en' => 'authorized' ,
                'created_at' => now() ,
            ] ,

            [
                'name_ar' => 'اكسسوارات العروسين' ,
                'name_en' => "Bride's accessories" ,
                'created_at' => now() ,
            ] ,

            [
                'name_ar' => 'طقم ضيافه' ,
                'name_en' => 'Hospitality kit' ,
                'created_at' => now() ,
            ] ,

        ]);
    }
}

