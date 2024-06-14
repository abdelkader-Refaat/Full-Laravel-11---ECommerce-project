<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => '{"ar" : "جوالات" , "en" :"phones"}',
            'slug' => '%phones%',
            'description' => '{"ar" :  "أحدث أنواع الموبايلات", "en" : "newest mobiles cersions"}',
            'image' => 'public/assets/uploads/Category/P9X1skPyAnkK7MHO4i5hrG9hz390VnfO1e1dikHq.png',
            'is_showing' => 1,
            'is_popular' => 0,
            'meta_description' => '{"ar" : "لدينا أحدث الاجهزة يرجي زيارتنا " , "en" : "we have newest mobiles please visit us"}',
            'meta_title' => '{"en" : "cairo - Giza", "ar" : "القاهرة - الجيزة"}',
            'meta_keywords' => '{phones, mobiles, iphone}',
        ]);

        DB::table('categories')->insert([
            'name' => '{"ar" : "جوالات" , "en" :"cars"}',
            'slug' => '%cars%',
            'description' => '{"ar" :  "أحدث أنواع السيارات", "en" : "newest cars cersions"}',
            'image' => 'public/assets/uploads/Category/P9X1skPyAnkK7MHO4i5hrG9hz390VnfO1e1dikHq.png',
            'is_showing' => 1,
            'is_popular' => 1,
            'meta_description' => '{"ar" : "لدينا أحدث السيارات  يرجي زيارتنا " , "en" : "we have newest cars please visit us"}',
            'meta_title' => '{"en" : "cairo - Giza", "ar" : "القاهرة - الجيزة"}',
            'meta_keywords' => '{veichle, car, cars}',
        ]);
    }
}
