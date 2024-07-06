<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         DB::table('products')->insert([
            [
                "category_id" => 1,
                "name" => '{"ar" :"أيفون",  "en" :"iphone"}',
                "slug" => "iphones",
                "short_description" => '{"ar" : "أفضل أنواع الموبايلات الأيفون لديناأحدث الإصدارات ", "en" : "newest iphone"}',
                "image" => "public/assets/uploads/Product/YUdL8WStcLTGgA4TA65m8gM3pQHk9hs7BRduUqWO.jpg",
                "price" => "1000",
                "selling_price" => "992",
                "qty" => "20",
                "tax" => "30",
                "meta_title" => "iphones , phone",
                "description" =>'{"ar" : "موبايل ايفون عالي الجوده","en" => "best and newest iphone  "}',
                "meta_keywords" => "iphone,apple",
                "status" => 1,
                "trend" => 1,
                "meta_description" => "extra"
             ],
             [
            "category_id" => 2,
            "name" => '{"ar" :"سيارات",  "en" :"cars"}',
            "slug" => "cars",
            "short_description" => '{"ar" : "أفضل أنواع  السيارات لديناأحدث الإصدارات ", "en" : "newest cars"}',
            "image" => "public/assets/uploads/Product/zRZ5iU875Mvcy9SgsRP5PgsgwY6Pj3hQZCcKFOu8.jpg",
            "price" => "1000",
            "selling_price" => "99432",
            "qty" => "20",
            "tax" => "30",
            "meta_title" => "cars , car",
            "description" =>'{"ar" : "  سيارات","en" => "best and newest cars  "}',
            "meta_keywords" => "cars , car",
            "status" => 1,
            "trend" => 1,
            "meta_description" => "extra",
         ],
         [ "category_id" => rand(1,2),
         "name" => '{"ar" :"سيارات",  "en" :"cars"}',
         "slug" => "car2s",
         "short_description" => '{"ar" : "أفضل أنواع  السيارات لديناأحدث الإصدارات ", "en" : "newest cars"}',
         "image" => "public/assets/uploads/Product/zRZ5iU875Mvcy9SgsRP5PgsgwY6Pj3hQZCcKFOu8.jpg",
         "price" => "1000",
         "selling_price" => "99432",
         "qty" => "20",
         "tax" => "30",
         "meta_title" => "cars , car",
         "description" =>'{"ar" : "  سيارات","en" => "best and newest cars  "}',
         "meta_keywords" => 'cars,car',
         "status" => 1,
         "trend" => 1,
         "meta_description" => "extra",
        ],]);
    }
}
