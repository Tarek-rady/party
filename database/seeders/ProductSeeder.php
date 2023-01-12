<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductSize;
use Carbon\Factory as CarbonFactory;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{

    public function run()
    {



          Product::insert([
              [
                'name_ar' => 'Griiled Beef Burger' ,
                'name_en' => 'برجر لحم مشوي' ,
                'title_ar' => 'بصل بالجبن' ,
                'title_en' => 'onion with cheese' ,
                'desc_ar' => 'تيست الوصف باللغه العربيه' ,
                'desc_en' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.' ,
                'price' => rand(20 , 30) ,
                'img' => 'products/1.jpg' ,
                'category_id' => rand(1,4) ,
                'created_at' => now() ,
              ] ,

              [
                'name_ar' => 'Chicken Beef Burger' ,
                'name_en' => 'برجر لحم دجاج' ,
                'title_ar' => 'بصل بالجبن' ,
                'title_en' => 'onion with cheese' ,
                'desc_ar' => 'تيست الوصف باللغه العربيه' ,
                'desc_en' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.' ,
                'price' => rand(20 , 30) ,
                'img' => 'products/2.jpg' ,
                'category_id' => rand(1,4) ,
                'created_at' => now() ,
              ] ,


              [
                'name_ar' => 'Griiled Beef Burger' ,
                'name_en' => 'برجر لحم مشوي' ,
                'title_ar' => 'بصل بالجبن' ,
                'title_en' => 'onion with cheese' ,
                'desc_ar' => 'تيست الوصف باللغه العربيه' ,
                'desc_en' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.' ,
                'price' => rand(20 , 30) ,
                'img' => 'products/3.jpg' ,
                'category_id' => rand(1,4) ,
                'created_at' => now() ,
              ] ,


              [
                'name_ar' => 'Griiled Beef Burger' ,
                'name_en' => 'برجر لحم مشوي' ,
                'title_ar' => 'بصل بالجبن' ,
                'title_en' => 'onion with cheese' ,
                'desc_ar' => 'تيست الوصف باللغه العربيه' ,
                'desc_en' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.' ,
                'price' => rand(20 , 30) ,
                'img' => 'products/4.jpg' ,
                'category_id' => rand(1,4) ,
                'created_at' => now() ,
              ] ,



              [
                'name_ar' => 'Griiled Beef Burger' ,
                'name_en' => 'برجر لحم مشوي' ,
                'title_ar' => 'بصل بالجبن' ,
                'title_en' => 'onion with cheese' ,
                'desc_ar' => 'تيست الوصف باللغه العربيه' ,
                'desc_en' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.' ,
                'price' => rand(20 , 30) ,
                'img' => 'products/5.jpg' ,
                'category_id' => rand(1,4) ,
                'created_at' => now() ,
              ] ,


              [
                'name_ar' => 'Griiled Beef Burger' ,
                'name_en' => 'برجر لحم مشوي' ,
                'title_ar' => 'بصل بالجبن' ,
                'title_en' => 'onion with cheese' ,
                'desc_ar' => 'تيست الوصف باللغه العربيه' ,
                'desc_en' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.' ,
                'price' => rand(20 , 30) ,
                'img' => 'products/6.jpg' ,
                'category_id' => rand(1,4) ,
                'created_at' => now() ,
              ] ,
          ]);

          for ($i=1; $i < 10 ; $i++) {
             ProductSize::create([
                'product_id' => rand(1,6) ,
                'size_id' => rand(1,3) ,

             ]);
          }


    }
}
